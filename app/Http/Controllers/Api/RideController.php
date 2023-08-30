<?php

namespace App\Http\Controllers\Api;

use App\Models\Ride;
use App\Models\Zone;
use App\Models\Queue;
use App\Models\ParkTime;
use App\Models\RideCycles;
use Illuminate\Http\Request;
use App\Events\StoppageEvent;
use App\Models\RideStoppages;
use App\Models\PreopeningList;
use Illuminate\Support\Carbon;
use App\Models\StopageCategory;
use App\Traits\Api\ApiResponse;
use App\Events\showNotification;
use App\Models\RideInspectionList;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\Api\InspectionsRequest;
use App\Http\Requests\Api\SubmitCycleRequest;
use App\Http\Requests\Api\UpdateCycleRequest;
use App\Http\Resources\User\TimeSlotResource;
use App\Http\Requests\Api\SubmitQueuesRequest;
use App\Http\Resources\User\Ride\RideResource;
use App\Http\Resources\User\InspectionResource;
use App\Http\Resources\User\Ride\RideInfoResource;
use App\Http\Resources\User\Ride\StoppageResource;
use App\Notifications\ZoneSupervisorNotifications;
use App\Http\Requests\Api\UpdateInspectionsRequest;
use App\Http\Resources\User\Ride\RideCycleResource;
use App\Http\Resources\User\Ride\RideQueueResource;
use App\Http\Requests\Api\UpdateCycleDurationRequest;

class RideController extends Controller
{
    use ApiResponse;

    protected function home()
    {
        $user = Auth::user();

        $this->body['rides'] = RideResource::collection($user->rides);
        return self::apiResponse(200, __('home page'), $this->body);
    }


    protected function ride($id)
    {
        $ride = Ride::find($id);

        if (!$ride) {
            return self::apiResponse(404, __('not found ride'), []);
        }
        $this->body['ride'] = RideInfoResource::make($ride);


        return self::apiResponse(200, __('home page'), $this->body);
    }

    protected function ridePreopening($id)
    {
        $inspects = RideInspectionList::where('ride_id', $id)->where('lists_type', 'preopening')->get();
        $this->body['inspections'] = InspectionResource::collection($inspects);
        return self::apiResponse(200, __('inspections'), $this->body);

    }

    protected function ridePreclosing($id)
    {
        $inspects = RideInspectionList::where('ride_id', $id)->where('lists_type', 'preclosing')->get();
        $this->body['inspections'] = InspectionResource::collection($inspects);
        return self::apiResponse(200, __('inspections'), $this->body);

    }

    protected function rideInspectionList($id)
    {
        $inspects = RideInspectionList::where('ride_id', $id)->where('lists_type', 'inspection_list')->get();
        $this->body['inspections'] = InspectionResource::collection($inspects);
        return self::apiResponse(200, __('inspections'), $this->body);

    }

    protected function storeInspection(InspectionsRequest $request)
    {
        $validate = $request->validated();
        foreach ($validate['inspection_list_id'] as $key => $inspection) {
            PreopeningList::query()->create([
                'ride_id' => $validate['ride_id'],
                'comment' => $validate['comment'][$key] ?? null,
                'opened_date' => $validate['opened_date'],
                'park_time_id' => $validate['park_time_id'] ?? null,
                'zone_id' => $validate['zone_id'],
                'park_id' => $validate['park_id'],
                'lists_type' => $validate['lists_type'],
                'created_by_id' => \auth()->user()->id,
                'inspection_list_id' => $inspection,
                'status' => $validate['status'][$key] ?? null,
                'is_checked' => $validate['is_checked'][$key] ?? null,
            ]);
        }
        $zone = Zone::find($validate['zone_id']);
        $ride = Ride::find($validate['ride_id']);

        $user = $zone->users()->whereHas('roles', function ($query) {
            return $query->where('name', 'zone supervisor');
        })->first();

        $data = [
            'title' => $validate['lists_type'] . ' check list added to ' . $ride?->name,
            'ride_id' => $ride->id,
            'user_id' => Auth::user()->id
        ];
        if ($user && $validate['lists_type'] != 'inspection_list') {
            event(new showNotification($user->id, $data['title'], Carbon::now()->toDateTimeString(), dateTime()?->id, $ride->id));
            Notification::send($user, new ZoneSupervisorNotifications($data));
        }
        return self::apiResponse(200, __('inspections created successfully'), []);

    }


    protected function rideStatus()
    {
        $stoppages = StopageCategory::query()->get();
        $this->body['stoppages_categories'] = StoppageResource::collection($stoppages);

        return self::apiResponse(200, __('stoppages categories'), $this->body);

    }


    protected function addCycle(SubmitCycleRequest $request)
    {
        $validate = $request->validated();
        $ride = Ride::query()->find($validate['ride_id']);
        $validate['user_id'] = \auth()->user()->id;
        $validate['sales'] = $validate['number_of_ft'] * $ride->ride_price_ft + $validate['riders_count'] * $ride->ride_price;
        $validate['opened_date'] = Carbon::now()->toDateString();
        $cycle = RideCycles::query()->create($validate);
        $this->body['cycle'] = RideCycleResource::make($cycle);
        $totalRiders = $validate['riders_count'] + $validate['number_of_disabled'] + $validate['number_of_vip'] + $validate['number_of_ft'];

        event(new \App\Events\TotalRidersEvent($cycle->park_id, $totalRiders));

        return self::apiResponse(200, __('create ride cycle successfully'), $this->body);

    }

    protected function updateCycleCount(UpdateCycleRequest $request)
    {
        $validate = $request->validated();
        $cycle = RideCycles::query()->find($validate['id']);
        $ride = Ride::query()->find($cycle->ride_id);
        $validate['sales'] = $validate['number_of_ft'] * $ride->ride_price_ft + $validate['riders_count'] * $ride->ride_price;
        $cycle->update($validate);
        $this->body['cycle'] = RideCycleResource::make($cycle);

        $totalRiders = $cycle->riders_count + $cycle->number_of_disabled + $cycle->number_of_vip + $cycle->number_of_ft;
        $newRiders = $validate['number_of_ft'] + $validate['riders_count'] + $validate['number_of_vip'] + $validate['number_of_disabled'];
        if ($newRiders > $totalRiders) {
            $total = $newRiders - $totalRiders;
            event(new \App\Events\TotalRidersEvent($cycle->park_id, $total));
        }
        return self::apiResponse(200, __('update ride cycle successfully'), $this->body);

    }

    protected function updateCycleDuration(UpdateCycleDurationRequest $request)
    {
        $validate = $request->validated();
        $cycle = RideCycles::query()->find($validate['id']);
        $ride = Ride::query()->find($cycle->ride_id);
        $cycle->update(['duration_seconds' => $validate['duration_seconds']]);
        $this->body['cycle'] = RideCycleResource::make($cycle);

        return self::apiResponse(200, __('update ride cycle duration seconds successfully'), $this->body);

    }

    protected function addQueues(SubmitQueuesRequest $request)
    {
        $validate = $request->validated();
        $validate['user_id'] = \auth()->user()->id;
        //$validate['queue_seconds'] = $validate['queue_minutes'] * 60;
        $validate['opened_date'] = Carbon::now()->toDateString();

        $queue = Queue::query()->create($validate);
        $this->body['queue'] = RideQueueResource::make($queue);

        event(new \App\Events\RideQueueEvent($validate['ride_id'], 'active'));

        return self::apiResponse(200, __('create queues successfully'), $this->body);

    }

    protected function stopQueues(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required|exists:queues,id',
            'queue_seconds' => 'required'
        ]);

        $queue = Queue::find($validate['id']);

        $queue->update(['queue_seconds' => $validate['queue_seconds']]);
        $this->body['queue'] = RideQueueResource::make($queue);

        event(new \App\Events\RideQueueEvent($queue->ride_id, 'not-active'));

        return self::apiResponse(200, __('update queues successfully'), $this->body);

    }

    protected function timeSlot()
    {
        $time = dateTime();
        $this->body['time_slot'] = null;
        if (!$time) {
            return self::apiResponse(404, __('not found time slot'),$this->body);
        }
        $this->body['time_slot'] = TimeSlotResource::make($time);
        return self::apiResponse(200, __('time slot info'), $this->body);

    }


}
