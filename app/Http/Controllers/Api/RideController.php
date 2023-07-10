<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\InspectionsRequest;
use App\Http\Requests\Api\SubmitCycleRequest;
use App\Http\Requests\Api\SubmitQueuesRequest;
use App\Http\Requests\Api\SubmitStoppageRequest;
use App\Http\Requests\Api\UpdateCycleDurationRequest;
use App\Http\Requests\Api\UpdateCycleRequest;
use App\Http\Resources\User\InspectionResource;
use App\Http\Resources\User\Ride\RideCycleResource;
use App\Http\Resources\User\Ride\RideQueueResource;
use App\Http\Resources\User\Ride\RideResource;
use App\Http\Resources\User\Ride\StoppageResource;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class RideController extends Controller
{
    use ApiResponse;

    public function home()
    {
        $user = Auth::user();


        $this->body['rides'] = RideResource::collection($user->rides);
        return self::apiResponse(200, __('home page'), $this->body);
    }

    public function ride($id)
    {
        $ride = Ride::find($id);

        if (!$ride) {
            return self::apiResponse(404, __('not found ride'), []);
        }
        $this->body['ride'] = RideResource::make($ride);


        return self::apiResponse(200, __('home page'), $this->body);
    }

    public function ridePreopening($id)
    {
        $inspects = RideInspectionList::where('ride_id', $id)->where('lists_type', 'preopening')->get();
        $this->body['inspections'] = InspectionResource::collection($inspects);
        return self::apiResponse(200, __('inspections'), $this->body);

    }

    public function ridePreclosing($id)
    {
        $inspects = RideInspectionList::where('ride_id', $id)->where('lists_type', 'preclosing')->get();
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
                'status' => $validate['status'][$key] ?? 'no',
                'is_checked' => $validate['is_checked'][$key] ?? 'no',
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
        if ($user) {
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

    protected function addRideStoppage(SubmitStoppageRequest $request)
    {
        $validate = $request->validated();
        $validate['user_id'] = \auth()->user()->id;
        $validate['ride_status'] = 'stopped';
        $validate['stoppage_status'] = 'pending';
        $ride = Ride::find($validate['ride_id']);
        $last = $ride->times->last();
        $validate['opened_date'] = $last->date;
//        dd($last);
        RideStoppages::query()->create($validate);
        event(new \App\Events\RideStatusEvent($validate['ride_id'], 'stopped'));
        return self::apiResponse(200, __('stoppage added successfully'), []);

    }

    protected function reopen(Request $request)
    {
        $validate = $request->validate([
            'ride_id' => 'required|exists:rides,id'
        ]);
        $ride = Ride::find($validate['ride_id']);
        $last = $ride->rideStoppages->last();
        $last->ride_status = 'active';
        $last->save();
        $this->body['ride'] = RideResource::make($ride);
        event(new \App\Events\RideStatusEvent($validate['ride_id'], 'active'));

        return self::apiResponse(200, __('update ride status successfully'), $this->body);

    }

    protected function addCycle(SubmitCycleRequest $request)
    {
        $validate = $request->validated();
        $ride = Ride::query()->find($validate['ride_id']);
        $validate['user_id'] = \auth()->user()->id;
        $validate['sales'] = $validate['number_of_ft'] * $ride->ride_price_ft + $validate['riders_count'] * $ride->ride_price;
        $cycle = RideCycles::query()->create($validate);
        $this->body['cycle'] = RideCycleResource::make($cycle);

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
//        $validate['queue_seconds'] = $validate['queue_minutes'] * 60;
        $queue = Queue::query()->create($validate);
        $this->body['queue'] = RideQueueResource::make($queue);

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
        return self::apiResponse(200, __('update queues successfully'), $this->body);

    }


}
