<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Dashboard\Accident\IncidentRequest;
use App\Http\Resources\User\DepartmentResource;
use App\Models\Department;
use App\Models\GeneralIncident;
use Illuminate\Support\Carbon;
use App\Traits\Api\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Accident\InvestigationRequest;

class HealthSaftyController extends Controller
{
    use ApiResponse;

    protected function incident(IncidentRequest $request)
    {

        $data = $request->validated();
        GeneralIncident::create([
            'type' => 'incident',
            'status' => 'pending',
            'park_id' => $data['park_id'],
            'ride_id' => $data['ride_id'],
            'date' => $data['date'],
            'created_by_id' => auth()->user()->id,
            'value' => $data
        ]);



        return self::apiResponse(200, __('incident'), []);
    }

    protected function investigation(InvestigationRequest $request)
    {

        $data = $request->validated();
        GeneralIncident::create([
            'type' => 'investigation',
            'park_id' => $data['park_id'],
            'ride_id' => $data['ride_id'],
            'status' => 'pending',
            'date' => Carbon::now(),
            'created_by_id' => auth()->user()->id,
            'value' => $data
        ]);
        return self::apiResponse(200, __('investigation'), []);

    }
    protected function departments(){
        $depaertments = Department::all();
        $this->body['depaertments'] = DepartmentResource::collection($depaertments)  ;
        return self::apiResponse(200, __('depaertments'), $this->body);

    }

}
