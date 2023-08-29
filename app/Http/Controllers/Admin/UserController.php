<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\User\StoreRequest;
use App\Http\Requests\Dashboard\User\UpdateRequest;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Park;
use App\Models\Ride;
use App\Models\RideUser;
use App\Models\User;
use App\Models\UserPark;
use App\Models\UserZone;
use App\Models\Zone;
use DateTimeZone;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use function Symfony\Component\String\length;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $items = User::all();
        $users = User::pluck('id');
        $user_zones_exist = UserZone::wherein('user_id', $users)->distinct()->pluck('user_id')->toArray();
        $user_parks_exist = UserPark::wherein('user_id', $users)->distinct()->pluck('user_id')->toArray();
        $user_rides_exist = RideUser::wherein('user_id', $users)->distinct()->pluck('user_id')->toArray();

        //dd($user_exist);
        return view('admin.users.index', compact('items', 'user_zones_exist', 'user_parks_exist', 'user_rides_exist'));
    }
    public function userRoles($id)
    {
        $user = User::findOrFail($id);
        $user_id = $id;

        $list = UserPark::where('user_id', $id)->pluck('park_id')->toArray();
        $branch = $user->branch_id;
        $parks = Park::where('branch_id', $branch)->get();

        $listZone = UserZone::where('user_id', $user_id)->pluck('zone_id')->toArray();
        $zones = Zone::where('branch_id', $branch)->get();

        $listRide = RideUser::where('user_id', $user_id)->pluck('ride_id')->toArray();
        $rides = $user->parks->pluck('rides')->all();
        return view('admin.users.roles', compact('user', 'parks', 'list', 'user_id', 'listZone', 'zones', 'listRide', 'rides'));

    }
    public function getZones(Request $request)
    {


        $listZone = UserZone::where('user_id', $request->user_id)->pluck('zone_id')->toArray();
        if ($request->arr != null) {
            $zones = Zone::whereIn('park_id', $request->arr)->get();
        } else {
            $zones = collect([]);
        }
        // dd($zones);

        return view('admin.users.zone_ajax', compact('listZone', 'zones'));

    }
    public function rolesUpdate(Request $request,$id)
    {
        $user = User::find($id);
        if (isset($request['park_id'])) {
            UserPark::where('user_id', $id)->delete();
            $parkIds = $request['park_id'];
            $user->parks()->attach($parkIds);
        }
        if (isset($request['zone_id'])) {
            UserZone::where('user_id', $user->id)->delete();
            $zoneIds = $request['zone_id'];
            $user->zones()->sync($zoneIds);
        }
        if (isset($request['ride_id'])) {
            RideUser::where('user_id', $user->id)->delete();
            $rides = $request['ride_id'];
            $user->rides()->sync($rides);
        }

        alert()->success('update successfully !');
        return redirect()->route('admin.users.index');


    }
    public function getRiders(Request $request)
    {


        $listRide = RideUser::where('user_id', $request->user_id)->pluck('ride_id')->toArray();
        $user = User::findOrFail($request->user_id);

        if ($request->arr != null) {
            $rides = Ride::whereIn('zone_id', $request->arr)->get();

        } else {
            $rides = collect([]);
        }


        return view('admin.users.ride_ajax', compact('listRide', 'rides'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        $departments = Department::pluck('name', 'id')->all();
        $branches = Branch::pluck('name', 'id')->all();
        return view('admin.users.add', compact('roles', 'departments', 'branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $user = User::create($request->validated());
        $user->assignRole($request->input('roles'));

        alert()->success('User added successfully !');
        return redirect()->route('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'id')->all();
        $branches = Branch::pluck('name', 'id')->all();
        $userRole = $user->roles()->first()->id ?? null;
        $departments = Department::pluck('name', 'id')->all();
        /*         $userparksIds=$user->parks->pluck('id')->toArray();
                $userzonesIds=$user->zones->pluck('id')->toArray();
                $parks=Park::get();
                $zones=Zone::get(); */
        return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles,
            'userRole' => $userRole,
            'departments' => $departments,
            'branches' => $branches
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $user)
    {
        $user->update($request->validated());

        \DB::table('model_has_roles')->where('model_id', $user->id)->delete();
        $user->assignRole($request->input('roles'));

        if (isset($request['park_id'])) {
            UserPark::where('user_id', $user->id)->delete();
            $parkIds = $request['park_id'];
            $user->parks()->attach($parkIds);
        }
        if (isset($request['zone_id'])) {
            UserZone::where('user_id', $user->id)->delete();
            $zoneIds = $request['zone_id'];
            $user->zones()->sync($zoneIds);
        }

        alert()->success('user edited successfully !');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        alert()->success('user deleted successfully !');
        return back();
    }
}
