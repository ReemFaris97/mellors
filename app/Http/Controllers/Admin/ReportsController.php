<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Ride;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function rideStatus(){

        $rides=Ride::all();
        $now=Carbon::now()->format('H:i:s');
//        foreach ($rides as $ride){
//            $time=$ride->park->whereHas('parkTimes',function ($q) use($ride,$now){
//                $status=$q->whereBetween($now,[$q->start,$q->end]);
//                dd($status);
//            });
//        }

        return view('admin.reports.ride_status',compact('rides'));
    }
}
