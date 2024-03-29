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
    public function addRideUser($user_id)
    {
        $user =User::findOrFail($user_id);
        $rides = $user->parks->pluck('rides')->all();
        return view('admin.ride_users.add',compact('user_id','rides'));
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
        $user=User::find($request['user_id']);
        $user->rides()->sync($request['ride_id']);
        alert()->success('Rides Added Successfully To user!');
        return redirect()->route('admin.users.index');
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
    public function edit($id)
    {
        $user_id=$id;
        $list=RideUser::where('user_id',$user_id)->pluck('ride_id')->toArray();
        $user =User::findOrFail($user_id);
        $rides = $user->parks->pluck('rides')->all();
        return view('admin.ride_users.edit',compact('user_id','user','rides','list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RideUser  $rideUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // return $id;
        RideUser::where('user_id',$request->user_id)->delete();
        $user=User::find($id);
        $user->rides()->sync($request['ride_id']);
        alert()->success('User Rides Updated Successfully !');
        return redirect()->route('admin.users.index');
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
