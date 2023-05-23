<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Dashboard\Ride\RideUserRequest;
use App\Http\Controllers\Controller;
use App\Models\Ride;
use App\Models\RideUser;
use App\Models\User;
use Illuminate\Http\Request;

class RideUserController extends Controller
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
    public function addRideUser($ride_id)
    {
        $users = User::get();
        $ride=Ride::findOrFail($ride_id);
        $user_id []= $ride->user_id;
        return view('admin.ride_users.add',compact('ride_id','users','user_id'));
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
    public function store(RideUserRequest $request)
    {
        RideUser::create($request->validated());
        $item = Ride::findOrFail($request->ride_id);
        $data['user_id']=$request->user_id;
        $item->update($data);
        alert()->success('User Added Successfully To Ride!');

        return redirect()->route('admin.rides.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RideUser  $rideUser
     * @return \Illuminate\Http\Response
     */
    public function show(RideUser $rideUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RideUser  $rideUser
     * @return \Illuminate\Http\Response
     */
    public function edit(RideUser $rideUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RideUser  $rideUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RideUser $rideUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RideUser  $rideUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(RideUser $rideUser)
    {
        //
    }
}
