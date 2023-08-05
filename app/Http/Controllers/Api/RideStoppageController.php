<?php

namespace App\Http\Controllers\Api;

use App\Events\StoppageEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SubmitStoppageRequest;
use App\Http\Requests\Api\UpdateStoppageRequest;
use App\Http\Resources\User\Ride\RideResource;
use App\Http\Resources\User\Ride\RideStoppageResource;
use App\Models\ParkTime;
use App\Models\Ride;
use App\Models\RideStoppages;
use App\Models\User;
use App\Notifications\StoppageNotifications;
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
            'time_id' => dateTime()?->id,
            'user_id' => Auth::user()->id,

        ];
        foreach ($users as $user) {
            Notification::send($user, new StoppageNotifications($data));
            event(new StoppageEvent($user->id, $data['title'], $stoppage->created_at, dateTime()?->id, $validate['ride_id']));
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
            'time_id' => dateTime()?->id,
            'user_id' => Auth::user()->id,

        ];
        if ($users) {
            foreach ($users as $user) {
                Notification::send($user, new StoppageNotifications($data));
                event(new StoppageEvent($user->id, $data['title'], $last->created_at, dateTime()?->id, $validate['ride_id']));
            }
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
        $users = User::whereHas('roles', function ($query) {
            return $query->where('name', 'Super Admin');
        })->get();
        foreach ($validate['id'] as $key => $id) {

            $stoppage = RideStoppages::find($id);
            $ride = Ride::find($stoppage->ride_id);
            $time = $validate['time'][$key];
            $stoppageStartTime = Carbon::parse("$park_time->date $stoppage->time_slot_start");
            $stoppageParkTimeEnd = Carbon::parse("$park_time->date $time");
            $stoppage->down_minutes = $stoppageParkTimeEnd->diffInMinutes($stoppageStartTime);
            $stoppage->ride_status = $validate['type'][$key];
            $stoppage->stoppage_status = $validate['type'][$key] == 'active' ? 'done' : 'pending';
            $stoppage->time_slot_end = $time;
            $stoppage->save();
            $ride->rideStoppages()?->where('ride_status', 'stopped')?->update(['ride_status' => 'active', 'stoppage_status' => 'working']);

            $data = [
                'title' => $stoppage->ride?->name . ' ' . 'has ' . $validate['type'][$key] . ' status',
                'ride_id' => $stoppage->ride_id,
                'time_id' => dateTime()?->id,
                'user_id' => Auth::user()->id,

            ];
            foreach ($users as $user) {
                Notification::send($user, new StoppageNotifications($data));
                event(new StoppageEvent($user->id, $data['title'], $stoppage->created_at, dateTime()?->id, $data['ride_id']));
            }
        }

        return self::apiResponse(200, __('update ride stoppage'), []);

    }
    protected function UpdateStoppageCategory(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required|exists:ride_stoppages,id',
            'stopage_category_id' => 'required|exists:stopage_categories,id',
            'stopage_sub_category_id' => 'required|exists:stopage_sub_categories,id',
            'type'=>'required',
            'description' =>'nullable'
        ]);
        RideStoppages::find($validate['id'])->update([
            'stopage_category_id' => $validate['stopage_category_id'],
            'stopage_sub_category_id' => $validate['stopage_sub_category_id'],
            'type' =>$validate['type'],
            'description' =>$validate['description'],

        ]);
        return self::apiResponse(200, __('update stoppage categories successfully!'), []);

    }


}
