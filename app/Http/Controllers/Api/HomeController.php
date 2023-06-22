<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\InspectionsRequest;
use App\Http\Resources\User\InspectionResource;
use App\Http\Resources\User\RideResource;
use App\Http\Resources\User\UserResource;
use App\Models\PreopeningList;
use App\Models\Ride;
use App\Models\RideInspectionList;
use App\Traits\Api\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    use ApiResponse;

    public function home()
    {
        $user = Auth::user();
        $this->body['rides'] = RideResource::collection($user->rides);
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
        foreach ($validate['inspection_list_id'] as $key => $inspection){
            PreopeningList::query()->create([
                'ride_id' =>$validate['ride_id'],
                'comment' =>$validate['comment'],
                'opened_date' =>$validate['opened_date'],
                'park_time_id' =>$validate['park_time_id'],
                'zone_id' =>$validate['zone_id'],
                'park_id' =>$validate['park_id'],
                'lists_type' =>$validate['lists_type'],
                'created_by_id' =>\auth()->user()->id,
                'inspection_list_id' =>$inspection,
                'status' =>$validate['status'][$key],
            ]);
        }
        return self::apiResponse(200, __('inspections created successfully'), []);

    }

}
