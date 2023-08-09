<?php

namespace App\Http\Controllers\Api;

use App\Models\Park;
use App\Models\ParkTime;
use Illuminate\Support\Carbon;
use App\Traits\Api\ApiResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\TimeResource;
use App\Http\Resources\User\Ride\RideResource;

class HomeController extends Controller
{
    use ApiResponse;

    protected function home()
    {
        if (auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Client')) {
            $parks = Park::pluck('id');
        } else {
            $parks = auth()->user()->parks->pluck('id');
        }
        $currentDate = Carbon::now()->toDateString();
        $currentTime = Carbon::now()->format('H:i');

        $times = ParkTime::where('date', $currentDate)
            ->orWhere(function ($subquery) use ($currentDate, $currentTime) {
                $subquery->where('close_date', $currentDate)
                    ->where('end', '>=', $currentTime);
            })->whereIn('park_id', $parks)
            ->get();
        $this->body['times'] = TimeResource::collection($times);

        return self::apiResponse(200, __('home page'), $this->body);
    }

}
