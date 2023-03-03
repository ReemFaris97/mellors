<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ride;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function rideStatus()
    {

        $now = Carbon::now()->format('H:i:s');
        $rides = DB::table('rides')
            ->join('parks', 'parks.id', '=', 'rides.park_id')
            ->leftJoin('park_times', function ($join) use ($now) {
                $join->on('park_times.park_id', '=', 'parks.id');
            })
            ->leftJoin('ride_stoppages', function ($join) use ($now) {
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
                if ($ride->stoppageRideStatus != null ){
                    $ride->available=$ride->stoppageRideStatus;
                }else{
                    $ride->available='active';
                    $ride->ride_notes='';
                    $ride->rideSroppageDescription='';
                }

            }
        }
        return view('admin.reports.ride_status', compact('rides'));
    }
}
