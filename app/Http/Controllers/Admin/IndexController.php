<?php

namespace App\Http\Controllers\Admin;
use App\Models\ParkTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Park;

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


        if (auth()->user()->hasRole('Super Admin') ||auth()->user()->hasRole('Visitor') ){
            $parks=Park::pluck('id');
        }else{
            $parks=auth()->user()->parks->pluck('id');
        }
$park_times = ParkTime::where('date', date('Y-m-d'))->wherein('park_id', $parks)->pluck('id');

$cycles = DB::table('rides')
    ->join('ride_cycles', 'rides.id', '=', 'ride_cycles.ride_id')
    ->join('park_times', 'ride_cycles.park_time_id', '=', 'park_times.id')
    ->join('parks', 'park_times.park_id', '=', 'parks.id')
    ->select(['rides.ride_cat', 'park_times.id as park_time_id', 
    DB::raw('AVG(ride_cycles.duration_seconds) as avg_duration'),
    DB::raw(' SUM(COALESCE(ride_cycles.riders_count, 0)) + 
    SUM(COALESCE(ride_cycles.number_of_disabled, 0)) + 
    SUM(COALESCE(ride_cycles.number_of_vip, 0)) + 
    SUM(COALESCE(ride_cycles.number_of_ft, 0)) as total_rider ')])
    ->groupBy('rides.ride_cat', 'park_times.id')
    ->whereIn('park_times.id', $park_times) 
    ->whereIn('parks.id', $parks)
    ->orderBy('park_times.id')
    ->get();
   // dd($cycles);

$queues = DB::table('rides')
    ->join('queues', 'rides.id', '=', 'queues.ride_id')
    ->join('park_times', 'queues.park_time_id', '=', 'park_times.id')
    ->join('parks', 'park_times.park_id', '=', 'parks.id')
    ->select(['rides.ride_cat', 'park_times.id as park_time_id', 
    DB::raw('AVG(queues.queue_minutes) as avg_queue_minutes')])
    ->groupBy('rides.ride_cat', 'park_times.id')
    ->whereIn('park_times.id', $park_times) 
    ->whereIn('parks.id', $parks)
    ->orderBy('park_times.id')
    ->get();
   // dd($queues);

$total_riders= DB::table('rides')
   ->join('ride_cycles', 'rides.id', '=', 'ride_cycles.ride_id')
   ->join('park_times', 'ride_cycles.park_time_id', '=', 'park_times.id')
   ->join('parks', 'park_times.park_id', '=', 'parks.id')
    ->select('park_times.id',
    DB::raw(' SUM(COALESCE(ride_cycles.riders_count, 0)) + 
    SUM(COALESCE(ride_cycles.number_of_disabled, 0)) + 
    SUM(COALESCE(ride_cycles.number_of_vip, 0)) + 
    SUM(COALESCE(ride_cycles.number_of_ft, 0)) as total_rider'))
    ->whereIn('park_times.id', $park_times) 
    ->whereIn('parks.id', $parks)
    ->groupBy('park_times.id')
    ->orderBy('park_times.id')
    ->get()
    ->groupBy('id');
     //  dd($total_riders);

     $rides = DB::table('rides')
     ->groupBy('rides.id')
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
         DB::raw('park_times.start,park_times.end,park_times.date,park_times.close_date'),
         DB::raw('ride_stoppages.ride_status as stoppageRideStatus,ride_stoppages.ride_notes,ride_stoppages.description as rideSroppageDescription'),


     ])->wherein('parks.id', $parks)
     ->get();
    
 foreach ($rides as $ride) {
     $now = Carbon::now();
     $start = Carbon::createFromTimeString("$ride->date $ride->start");
     $end = Carbon::createFromTimeString("$ride->close_date $ride->end");
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
// dd( $rides);



       $times = ParkTime::where('date', date('Y-m-d'))->wherein('park_id', $parks)->get();


        return view('admin.layout.home',compact('rides','queues','cycles','times','total_riders'));
    }
}
