<?php

namespace App\Http\Controllers\Admin;
use App\Models\ParkTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $rides = DB::table('rides')
            ->join('parks', 'parks.id', '=', 'rides.park_id')
            ->leftJoin('park_times', function ($join) {
                $join->on('park_times.park_id', '=', 'parks.id');
            })
            ->leftJoin('ride_stoppages', function ($join) {
                $join->on('ride_stoppages.ride_id', '=', 'rides.id');
            })
            ->select([
                DB::raw('rides.*'),
                DB::raw('parks.name as parkName'),
                DB::raw('park_times.start,park_times.end'),
                DB::raw('ride_stoppages.ride_status as stoppageRideStatus,ride_stoppages.ride_notes,ride_stoppages.description as rideSroppageDescription'),

            ])->get();
        foreach ($rides as $ride) {
            $now = Carbon::now();
            $start = Carbon::createFromTimeString($ride->start);
            $end = Carbon::createFromTimeString($ride->end)->addDay();
            if ($now->between($start, $end)) {
                if ($ride->stoppageRideStatus != null) {
                    $ride->available = $ride->stoppageRideStatus;
                } else {
                    $ride->available = 'active';
                    $ride->ride_notes = '';
                    $ride->rideSroppageDescription = '';
                }

            } else {

                $ride->available = 'closed';
                $ride->ride_notes = 'out of park time slot ';
                $ride->rideSroppageDescription = '';
            }
        }

        $park_times = ParkTime::where('date', date('Y-m-d'))->get();
//        $park_times = ParkTime::all();

        return view('admin.layout.home',compact('rides','park_times'));
    }
}
