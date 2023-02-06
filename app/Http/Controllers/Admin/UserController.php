<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\User\StoreRequest;
use App\Http\Requests\Dashboard\User\UpdateRequest;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Park;
use App\Models\User;
use App\Models\UserPark;
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
        $items=User::all();
        return view('admin.users.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $roles = Role::pluck('name','name')->all();
        $departments = Department::pluck('name','id')->all();
        $branches = Branch::pluck('name','id')->all();
        $parks = Park::pluck('name','id')->all();

        return  view('admin.users.add',compact('roles','departments','branches','parks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $user=User::create($request->validated());
        $user->assignRole($request->input('roles'));
        if(isset($request['park_id']))
        {
        $input['user_id'] = $user->id;
        foreach ($request['park_id'] as $id)
        {
            $input['park_id'] = $id;
            UserPark::create($input);
        }
        }
        alert()->success('user added successfully !');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name','id')->all();
        $branches = Branch::pluck('name','id')->all();
        $userRole = $user->roles()->first()->id ?? null;
        $departments = Department::pluck('name','id')->all();
        $parks = Park::pluck('name','id')->all();

        return  view('admin.users.edit')->with(['user'=>$user,'roles'=>$roles,
            'userRole'=>$userRole,'departments'=>$departments,'branches'=>$branches,'parks'=>$parks]);
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

        \DB::table('model_has_roles')->where('model_id',$user->id)->delete();
        $user->assignRole($request->input('roles'));

        alert()->success('user edited successfully !');
        return  redirect()->route('admin.users.index');
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
        return  back();
    }
}
