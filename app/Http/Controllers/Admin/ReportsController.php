<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Park;
use App\Models\PreopeningList;
use App\Models\Ride;
use App\Models\RideStoppages;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function rideStatus()
    {

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

            ])->get();
        foreach ($rides as $ride) {
            $now = Carbon::now();
            $start = Carbon::createFromFormat('Y-m-d H:i:s', "{$ride->date} {$ride->start}");
            $end = Carbon::createFromFormat('Y-m-d H:i:s', "{$ride->close_date} {$ride->end}");
            if ($now->between($start, $end)) {
                if ($ride->stoppageRideStatus != null ){
                    $ride->available=$ride->stoppageRideStatus;
                }else{
                    $ride->available='active';
                    $ride->ride_notes='';
                    $ride->rideSroppageDescription='';
                }

            }else{

                $ride->available='closed';
                $ride->ride_notes='out of park time slot ';
                $ride->rideSroppageDescription='';
            }
        }
        return view('admin.reports.ride_status', compact('rides'));
    }
    public function stoppagesReport()
    {
        if (auth()->user()->hasRole('Super Admin')){
            $parks=Park::pluck('name','id')->all();
        }else{
            $parks=auth()->user()->parks->pluck('name','id')->all();
        }
        return view('admin.reports.stoppage_report', compact('parks'));

    }
    public function showstoppagesReport(Request $request){
         $from = $request->input('from');
        $to = $request->input('to');
        $park_id = $request->input('park_id');
        $items = RideStoppages::whereBetween('opened_date',[$from, $to])
            ->where('park_id',$park_id)
            ->get();
       //     return $items;
            if($request->input('ride_id'))
            {
                $items->where('ride_id',$request->input('ride_id'));
            } 
            if (auth()->user()->hasRole('Super Admin')){
                $parks=Park::pluck('name','id')->all();
            }else{
                $parks=auth()->user()->parks->pluck('name','id')->all();
            }

        return view('admin.reports.stoppage_report', compact('items','parks','request'));
    }
    public function inspectionListReport()
    {
        if (auth()->user()->hasRole('Super Admin')){
            $parks=Park::pluck('name','id')->all();
        }else{
            $parks=auth()->user()->parks->pluck('name','id')->all();
        }
        return view('admin.reports.inspection_list_report', compact('parks'));

    }
    public function showInspectionListReport(Request $request){
        $from = $request->input('from');
       $to = $request->input('to');
       $park_id = $request->input('park_id');
       $items = PreopeningList::whereBetween('opened_date',[$from, $to])
           ->where('park_id',$park_id)
           ->get();
      //     return $items;
           if($request->input('ride_id'))
           {
               $items->where('ride_id',$request->input('ride_id'));
           } 
           if (auth()->user()->hasRole('Super Admin')){
               $parks=Park::pluck('name','id')->all();
           }else{
               $parks=auth()->user()->parks->pluck('name','id')->all();
           }

       return view('admin.reports.inspection_list_report', compact('items','parks','request'));
   }
    
}
