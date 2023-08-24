<?php

namespace App\Http\Controllers\Admin;

use App\Models\ParkTime;
use Illuminate\Support\Carbon;

//use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Park;
use App\Models\Ride;
use App\Models\Zone;
use App\Models\RideStoppages;

use App\Models\StopageSubCategory;
use App\Models\Notification;


class AutoRefreshController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        if (auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Client')) {
            $parks = Park::pluck('id');
        } else {
            $parks = auth()->user()->parks->pluck('id');
        }
        $currentDate = Carbon::now()->toDateString();
        $currentTime = Carbon::now()->format('H:i');

        $park_times = ParkTime::where('date', $currentDate)
            ->orWhere(function ($subquery) use ($currentDate, $currentTime) {
                $subquery->where('close_date', $currentDate)
                    ->where('end', '>=', $currentTime);
            })->whereIn('park_id', $parks)
            ->pluck('id');
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

        //get queue avg
        $queues = DB::table('rides')
            ->join('queues', 'rides.id', '=', 'queues.ride_id')
            ->join('park_times', 'queues.park_time_id', '=', 'park_times.id')
            ->join('parks', 'park_times.park_id', '=', 'parks.id')
            ->select([
                'rides.ride_cat',
                'park_times.id as park_time_id',
                DB::raw('AVG(queues.queue_seconds  / 60) as avg_queue_minutes')
            ])
            ->groupBy('rides.ride_cat', 'park_times.id')
            ->whereIn('park_times.id', $park_times)
            ->whereIn('parks.id', $parks)
            ->orderBy('park_times.id')
            ->get();
        // dd ($queues);
        $stoppages = RideStoppages::whereIn('park_time_id', $park_times)
            ->whereIn('park_id', $parks)
            ->where('stoppage_status', 'done')
            ->get();
        //   dd ($stoppages);
//get total riders
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

        //get ride status
        $rides = DB::table('rides')
            ->join('parks', 'parks.id', '=', 'rides.park_id')
            ->leftJoin('park_times', function ($join) {
                $join->on('park_times.park_id', '=', 'parks.id')
                    ->whereDate('park_times.date', '=', Carbon::now()->toDateString());
            })
            ->leftJoin('ride_stoppages', function ($join) {
                $join->on('ride_stoppages.ride_id', '=', 'rides.id')
                    ->where('ride_stoppages.created_at', function ($subquery) {
                        $subquery->select(DB::raw('MAX(created_at)'))
                            ->from('ride_stoppages')
                            ->whereColumn('ride_stoppages.ride_id', 'rides.id');
                    });
            })
            ->select([
                'rides.*',
                'parks.name as parkName',
                'park_times.start',
                'park_times.end',
                'park_times.date',
                'park_times.close_date',
                'ride_stoppages.ride_status as stoppageRideStatus',
                'ride_stoppages.ride_notes',
                'ride_stoppages.stopage_sub_category_id as stoppageSubCategory',
                'ride_stoppages.description as rideSroppageDescription',
            ])
            ->whereIn('parks.id', $parks)
            ->get();

        foreach ($rides as $ride) {
            $now = Carbon::now();
            $startDateTime = Carbon::parse("$ride->date $ride->start");
            $endDateTime = Carbon::parse("$ride->close_date $ride->end");
            if ($ride->stoppageRideStatus != null) {
                $ride->available = $ride->stoppageRideStatus;

                if (!is_null($ride->stoppageSubCategory)) {
                    $stoppageSubCategory = StopageSubCategory::find($ride->stoppageSubCategory);
                    $ride->stoppageSubCategoryName = $stoppageSubCategory->name;
                }
            } else {
                $ride->available = 'active';
                $ride->ride_notes = '';
                $ride->rideSroppageDescription = '';
            }

        }

        $times = ParkTime::where('date', $currentDate)
            ->orWhere(function ($subquery) use ($currentDate, $currentTime) {
                $subquery->where('close_date', $currentDate)
                    ->where('end', '>=', $currentTime);
            })->whereIn('park_id', $parks)
            ->get();

        return view('admin.layout.ajax', compact('stoppages', 'rides', 'queues', 'cycles', 'times', 'total_riders'));

    }

}
