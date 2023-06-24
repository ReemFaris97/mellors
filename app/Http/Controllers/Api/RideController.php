<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\InspectionsRequest;
use App\Http\Resources\User\InspectionResource;
use App\Http\Resources\User\RideResource;
use App\Models\PreopeningList;
use App\Models\Ride;
use App\Models\RideInspectionList;
use App\Models\Zone;
use App\Notifications\ZoneSupervisorNotifications;
use App\Traits\Api\ApiResponse;
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
        if (!$ride){
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
                'comment' => $validate['comment'],
                'opened_date' => $validate['opened_date'],
                'park_time_id' => $validate['park_time_id'],
                'zone_id' => $validate['zone_id'],
                'park_id' => $validate['park_id'],
                'lists_type' => $validate['lists_type'],
                'created_by_id' => \auth()->user()->id,
                'inspection_list_id' => $inspection,
                'status' => $validate['status'][$key],
                'is_checked' => $validate['is_checked'][$key],
            ]);
        }
        $zone = Zone::find($validate['zone_id']);
        $ride = Ride::find($validate['ride_id']);

        $user = $zone->users()->whereHas('roles', function ($query) {
            return $query->where('name', 'zone supervisor');
        })->first();
        $data = [
            'title' => $validate['lists_type'] . ' check list added to ' . $ride->name,
            'ride_id' => $ride->id,
            'user_id' =>\auth()->user()->id
        ];
        Notification::send($user, new ZoneSupervisorNotifications($data));

        return self::apiResponse(200, __('inspections created successfully'), []);

    }

    protected function rideStatus(){
        
    }

}
