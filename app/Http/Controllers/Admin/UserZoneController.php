<?php
namespace App\Http\Controllers\Admin;
use App\Http\Requests\Dashboard\User\UserZoneRequest;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\User;
use App\Models\UserZone;
use App\Models\Zone;
use Illuminate\Http\Request;

class UserZoneController extends Controller
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
    public function addUserZone($user_id)
    {
        $user =User::findOrFail($user_id);
        $branch=$user->branch_id;
        $zones=Zone::where('branch_id',$branch)->get();
        return view('admin.user_zones.add',compact('user_id','zones'));
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
    public function store(UserZoneRequest $request)
    {
        $user=User::find($request['user_id']);
        $user->zones()->sync($request['zone_id']);
        alert()->success('Zones Added Successfully To user!');
        return redirect()->route('admin.users.index');
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
    public function edit($id)
    {
        $user_id=$id;
        $list=UserZone::where('user_id',$user_id)->pluck('zone_id')->toArray();

        $user =User::findOrFail($user_id);
        $branch=$user->branch_id;
        $zones=Zone::where('branch_id',$branch)->get();
        return view('admin.user_zones.edit',compact('user_id','user','zones','list'));

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
        UserZone::where('user_id',$request->user_id)->delete();
        $user=User::find($id);
        $user->zones()->sync($request['zone_id']);
        alert()->success('User Zone Updated Successfully !');
        return redirect()->route('admin.users.index');
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
