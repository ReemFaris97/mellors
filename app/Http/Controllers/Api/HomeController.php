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
        if (auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Visitor')) {
            $parks = Park::pluck('id');
        } else {
            $parks = auth()->user()->parks->pluck('id');
        }
        $park_times = ParkTime::where('date', date('Y-m-d'))->wherein('park_id', $parks)->pluck('id');

        $cycles = DB::table('rides')
            ->join('ride_cycles', 'rides.id', '=', 'ride_cycles.ride_id')
            ->join('park_times', 'ride_cycles.park_time_id', '=', 'park_times.id')
            ->join('parks', 'park_times.park_id', '=', 'parks.id')
            ->select([
                'rides.ride_cat',
                'park_times.id as park_time_id',
                DB::raw('AVG(ride_cycles.duration_seconds) as avg_duration'),
                DB::raw(' SUM(COALESCE(ride_cycles.riders_count, 0)) +
                          SUM(COALESCE(ride_cycles.number_of_disabled, 0)) +
                          SUM(COALESCE(ride_cycles.number_of_vip, 0)) +
                          SUM(COALESCE(ride_cycles.number_of_ft, 0)) as total_rider ')
            ])
            ->groupBy('rides.ride_cat', 'park_times.id')
            ->whereIn('park_times.id', $park_times)
            ->whereIn('parks.id', $parks)
            ->orderBy('park_times.id')
            ->get();

        $queues = DB::table('rides')
            ->join('queues', 'rides.id', '=', 'queues.ride_id')
            ->join('park_times', 'queues.park_time_id', '=', 'park_times.id')
            ->join('parks', 'park_times.park_id', '=', 'parks.id')
            ->select([
                'rides.ride_cat',
                'park_times.id as park_time_id',
                DB::raw('AVG(queues.queue_minutes) as avg_queue_minutes')
            ])
            ->groupBy('rides.ride_cat', 'park_times.id')
            ->whereIn('park_times.id', $park_times)
            ->whereIn('parks.id', $parks)
            ->orderBy('park_times.id')
            ->get();

        $total_riders = DB::table('rides')
            ->join('ride_cycles', 'rides.id', '=', 'ride_cycles.ride_id')
            ->join('park_times', 'ride_cycles.park_time_id', '=', 'park_times.id')
            ->join('parks', 'park_times.park_id', '=', 'parks.id')
            ->select(
                'park_times.id',
                DB::raw('SUM(COALESCE(ride_cycles.riders_count, 0)) +
                        SUM(COALESCE(ride_cycles.number_of_disabled, 0)) +
                        SUM(COALESCE(ride_cycles.number_of_vip, 0)) +
                        SUM(COALESCE(ride_cycles.number_of_ft, 0)) as total_rider')
            )
            ->whereIn('park_times.id', $park_times)
            ->whereIn('parks.id', $parks)
            ->groupBy('park_times.id')
            ->orderBy('park_times.id')
            ->get()
            ->groupBy('id');


 
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
