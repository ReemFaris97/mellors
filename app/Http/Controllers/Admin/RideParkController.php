<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Dashboard\Ride\RideParkRequest;
use App\Http\Controllers\Controller;

use App\Models\Park;
use App\Models\Ride;
use App\Models\RidePark;
use Illuminate\Http\Request;

class RideParkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    public function addRidePark($ride_id)
    {
        $parks = Park::get();
        $ride=Ride::findOrFail($ride_id);
        $park_id []= $ride->park_id;
        return view('admin.ride_parks.add',compact('ride_id','parks','park_id'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RideParkRequest $request)
    {
        RidePark::create($request->validated());
        $item = Ride::findOrFail($request->ride_id);
        $data['park_id']=$request->park_id;
        $item->update($data);
        alert()->success('Park Added Successfully To Ride!');

        return redirect()->route('admin.rides.index');  
      }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RidePark  $ridePark
     * @return \Illuminate\Http\Response
     */
    public function show(RidePark $ridePark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RidePark  $ridePark
     * @return \Illuminate\Http\Response
     */
    public function edit(RidePark $ridePark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RidePark  $ridePark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RidePark $ridePark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RidePark  $ridePark
     * @return \Illuminate\Http\Response
     */
    public function destroy(RidePark $ridePark)
    {
        //
    }
}