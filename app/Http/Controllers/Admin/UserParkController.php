<?php
namespace App\Http\Controllers\Admin;
use App\Http\Requests\Dashboard\User\UserParkRequest;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Park;
use App\Models\User;
use App\Models\UserPark;
use App\Models\Zone;
use Illuminate\Http\Request;

class UserParkController extends Controller
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
    public function addUserPark($user_id)
    {
        $user =User::findOrFail($user_id);
        $branch=$user->branch_id;
        $parks=Park::where('branch_id',$branch)->get();
        return view('admin.user_parks.add',compact('user_id','parks'));
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
    public function store(UserParkRequest $request)
    {
        $user=User::find($request['user_id']);
        $user->parks()->sync($request['park_id']);
        alert()->success('Parks Added Successfully To user!');
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RideZone  $rideZone
     * @return \Illuminate\Http\Response
     */
    public function show(UserPark $userPark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RideZone  $rideZone
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id=$id;
        $list=UserPark::where('user_id',$user_id)->pluck('park_id')->toArray();

        $user =User::findOrFail($user_id);
        $branch=$user->branch_id;
        $parks=Park::where('branch_id',$branch)->get();
        return view('admin.user_parks.edit',compact('user_id','user','parks','list'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RideZone  $rideZone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // return $id;
        UserPark::where('user_id',$request->user_id)->delete();
        $user=User::find($id);
        $user->parks()->sync($request['park_id']);
        alert()->success('User Park Updated Successfully !');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RideZone  $rideZone
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPark $rideZone)
    {
        //
    }
}
