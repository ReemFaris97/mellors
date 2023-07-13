<?php

namespace App\Http\Controllers\Api;

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
use App\Models\Zone;
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
        RideStoppages::query()->create($validate);
        event(new \App\Events\RideStatusEvent($validate['ride_id'], 'stopped'));
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

        $this->body['ride'] = RideResource::make($ride);
        event(new \App\Events\RideStatusEvent($validate['ride_id'], 'active'));

        return self::apiResponse(200, __('update ride status successfully'), $this->body);

    }

    protected function getRideStoppages($id)
    {
        $ride = Ride::query()->find($id);
        if (!$ride) {
            return self::apiResponse(200, __('ride not found'), []);
        }
        $stoppage = $ride->rideStoppages->whereBetween('date', [dateTime()?->date, dateTime()?->close_date]);
        $this->body['ride_stoppage'] = RideStoppageResource::collection($stoppage);
        return self::apiResponse(200, __('get ride stoppage'), $this->body);
    }

    protected function UpdateRideStoppages(UpdateStoppageRequest $request)
    {
        $validate = $request->validated();
        $park_time = dateTime();

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
