<?php
namespace App\Http\Controllers\Admin;
use App\Http\Requests\Dashboard\Ride\RideZoneRequest;

use App\Http\Controllers\Controller;
use App\Models\Ride;
use App\Models\RideZone;
use App\Models\Zone;
use Illuminate\Http\Request;

class RideZoneController extends Controller
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
    public function addRideZone($ride_id)
    {
        $zones = Zone::get();
        $ride=Ride::findOrFail($ride_id);
        $zone_id []= $ride->zone_id;
        return view('admin.ride_zones.add',compact('ride_id','zones','zone_id'));
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
    public function store(RideZoneRequest $request)
    {
        RideZone::create($request->validated());
        $item = Ride::findOrFail($request->ride_id);
        $data['zone_id']=$request->zone_id;
        $item->update($data);
        alert()->success('Zone Added Successfully To Ride!');

        return redirect()->route('admin.rides.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RideZone  $rideZone
     * @return \Illuminate\Http\Response
     */
    public function show(RideZone $rideZone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RideZone  $rideZone
     * @return \Illuminate\Http\Response
     */
    public function edit(RideZone $rideZone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RideZone  $rideZone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RideZone $rideZone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RideZone  $rideZone
     * @return \Illuminate\Http\Response
     */
    public function destroy(RideZone $rideZone)
    {
        //
    }
}
