<?php

namespace App\Http\Controllers\Admin;


use App\Models\Park;
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
        } else {
            $parks = auth()->user()->parks->pluck('id');
        }
        $items = RideCapacity::whereIn('park_id', $parks)->where('date', Carbon::now()->toDateString())->get();
        return view('admin.ride_capacity.index', compact('items'));
    }




    public function update(Request $request)
    {

        $capacity = RideCapacity::find($request->id);
        $capacity->update(['final_capacity' => $request->final_capacity]);
        alert()->success('Final Capacity Updated successfully !');
        return redirect()->back();

    }




}
