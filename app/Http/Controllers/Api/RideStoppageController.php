<?php

namespace App\Http\Controllers\Api;

use App\Events\StoppageEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\InspectionsRequest;
use App\Http\Requests\Api\SubmitCycleRequest;
use App\Http\Requests\Api\SubmitQueuesRequest;
use App\Http\Requests\Api\SubmitStoppageRequest;
use App\Http\Requests\Api\UpdateCycleDurationRequest;
use App\Http\Requests\Api\UpdateCycleRequest;
use App\Http\Requests\Api\UpdateStoppageRequest;
use App\Http\Resources\User\InspectionResource;
use App\Http\Resources\User\Ride\RideCycleResource;
use App\Http\Resources\User\Ride\RideQueueResource;
use App\Http\Resources\User\Ride\RideResource;
use App\Http\Resources\User\Ride\RideStoppageResource;
use App\Http\Resources\User\Ride\StoppageResource;
use App\Http\Resources\User\TimeSlotResource;
use App\Models\ParkTime;
use App\Models\PreopeningList;
use App\Models\Queue;
use App\Models\Ride;
use App\Models\RideCycles;
use App\Models\RideInspectionList;
use App\Models\RideStoppages;
use App\Models\StopageCategory;
use App\Models\User;
use App\Models\Zone;
use App\Notifications\StoppageNotifications;
use App\Notifications\ZoneSupervisorNotifications;
use App\Traits\Api\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class RideStoppageController extends Controller
{
    use ApiResponse;


    protected function addRideStoppage(SubmitStoppageRequest $request)
    {
        $validate = $request->validated();

        $validate['user_id'] = \auth()->user()->id;
        $validate['ride_status'] = 'stopped';
        $validate['stoppage_status'] = 'pending';
        $park_time = ParkTime::findOrFail($validate['park_time_id']);
        $open = $validate['date'];
        $time_slot_start = $validate['time_slot_start'];
        $stoppageStartTime = Carbon::parse("$open $time_slot_start");
        $stoppageParkTimeEnd = Carbon::parse("$park_time->close_date $park_time->end");
        $validate['down_minutes'] = $stoppageParkTimeEnd->diffInMinutes($stoppageStartTime);
        $validate['opened_date'] = $open;
        $validate['time'] = \Carbon\Carbon::now()->toTimeString();
        $stoppage = RideStoppages::query()->create($validate);
        event(new \App\Events\RideStatusEvent($validate['ride_id'], 'stopped', $stoppage->stopageSubCategory?->name));

        $users = User::whereHas('roles', function ($query) {
            return $query->where('name', 'Super Admin');
        })->get();

        $data = [
            'title' => $stoppage->ride?->name . ' ' . 'has stoppage status',
            'ride_id' => $validate['ride_id'],
            'user_id' => Auth::user()->id,

        ];
        foreach ($users as $user) {
            Notification::send($user, new StoppageNotifications($data));
            event(new StoppageEvent($user->id, $data['title'],$stoppage->created_at));
        }
        return self::apiResponse(200, __('stoppage added successfully'), []);

    }

    protected function reopen(Request $request)
    {
        $validate = $request->validate([
            'ride_id' => 'required|exists:rides,id',
            'park_time_id' => 'required|exists:park_times,id',
            'time' => 'required',
        ]);

        $time = $validate['time'];
        $ride = Ride::find($validate['ride_id']);
        $last = $ride->rideStoppages->last();

        $park_time = ParkTime::findOrFail($validate['park_time_id']);
        $stoppageStartTime = Carbon::parse("$park_time->date $last->time_slot_start");
        $stoppageParkTimeEnd = Carbon::parse("$park_time->date $time");
        $last->down_minutes = $stoppageParkTimeEnd->diffInMinutes($stoppageStartTime);
        $last->ride_status = 'active';
        $last->stoppage_status = 'done';
        $last->time_slot_end = $validate['time'];
        $last->save();

        $ride->rideStoppages()?->where('ride_status', 'stopped')?->update(['ride_status' => 'active', 'stoppage_status' => 'working']);
        $ride = Ride::find($validate['ride_id']);

        $this->body['ride'] = RideResource::make($ride);
        event(new \App\Events\RideStatusEvent($validate['ride_id'], 'active', $last->stopageSubCategory?->name));

        $users = User::whereHas('roles', function ($query) {
            return $query->where('name', 'Super Admin');
        })->get();

        $data = [
            'title' => $ride?->name . ' ' . 'has active status',
            'ride_id' => $validate['ride_id'],
            'user_id' => Auth::user()->id
        ];
        if ($users) {
            Notification::send($users, new StoppageNotifications($data));
        }
        return self::apiResponse(200, __('update ride status successfully'), $this->body);

    }

    protected function getRideStoppages($id)
    {
        $ride = Ride::query()->find($id);
        if (!$ride) {
            return self::apiResponse(200, __('ride not found'), []);
        }
        $rideStoppages = $ride->rideStoppages ?? collect(); // Provide an empty collection if $ride->rideStoppages is null

        $stoppage = $rideStoppages->whereBetween('date', [dateTime()?->date, dateTime()?->close_date]);

        if (dateTime() == null) {
            $this->body['ride_stoppage'] = [];
        }
        $this->body['ride_stoppage'] = RideStoppageResource::collection($stoppage);
        return self::apiResponse(200, __('get ride stoppage'), $this->body);
    }

    protected function UpdateRideStoppages(UpdateStoppageRequest $request)
    {
        $validate = $request->validated();
        $park_time = dateTime();
        if ($park_time == null) {
            return self::apiResponse(200, __('not found time slot'), []);
        }
        foreach ($validate['id'] as $key => $id) {
            $stoppage = RideStoppages::find($id);
            $time = $validate['time'][$key];
            $stoppageStartTime = Carbon::parse("$park_time->date $stoppage->time_slot_start");
            $stoppageParkTimeEnd = Carbon::parse("$park_time->date $time");
            $stoppage->down_minutes = $stoppageParkTimeEnd->diffInMinutes($stoppageStartTime);
            $stoppage->ride_status = $validate['type'][$key];
            $stoppage->stoppage_status = $validate['type'][$key] == 'active' ? 'done' : 'pending';
            $stoppage->time_slot_end = $time;
            $stoppage->save();
        }

        return self::apiResponse(200, __('update ride stoppage'), []);

    }


}
