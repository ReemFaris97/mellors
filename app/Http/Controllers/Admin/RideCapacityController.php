<?php

namespace App\Http\Controllers\Admin;


use App\Models\Park;
use App\Models\Ride;
use App\Models\RideCapacity;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;


class RideCapacityController extends Controller
{



    public function index()
    {
        if (auth()->user()->hasRole('Super Admin')) {
            $parks = Park::pluck('id');
            $rides = Ride::pluck('name', 'id')->all();

        } else {
            $parks = auth()->user()->parks->pluck('id');
            $rides = auth()->user()->rides->pluck('name', 'id');
        }
        if (request('ride_id')) {
            $items = RideCapacity::whereIn('park_id', $parks)->where('date', Carbon::now()->toDateString())
                ->where('ride_id', request('ride_id'))
                ->get();

        } else {
            $items = RideCapacity::whereIn('park_id', $parks)->where('date', Carbon::now()->toDateString())->get();

        }
        return view('admin.ride_capacity.index', compact('items', 'rides'));
    }

    protected function report(Request $request){
        $from = $request->input('from');
        $to = $request->input('to');
        $park_id = $request->input('park_id');
        $items = RideCapacity::where('park_id', $park_id)
            ->get();

        if ($request->input('ride_id')) {
            $items = $items->where('ride_id', $request->input('ride_id'));
        }
        if ($request->input('from')) {
            $items = $items->where('date','>=', $request->input('from'));
        }

        if ($request->input('to')) {
            $items = $items->where('date','<=', $request->input('to'));
        }

        if (auth()->user()->hasRole('Super Admin')) {
            $parks = Park::pluck('name', 'id')->all();

        } else {
            $parks = auth()->user()->parks->pluck('name', 'id')->all();

        }
        return view('admin.ride_capacity.report', compact('items','parks'));

    }




    public function update(Request $request)
    {

        $capacity = RideCapacity::find($request->id);
        $capacity->update(['final_capacity' => $request->final_capacity]);
        alert()->success('Final Capacity Updated successfully !');
        return redirect()->back();

    }




}
