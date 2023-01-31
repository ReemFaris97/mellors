<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Zone\ZoneRequest;
use App\Models\Zone;
use App\Models\Park;
use App\Models\User;
use Spatie\Permission\Models\Role;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Zone::all();
        return view('admin.zones.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::role('zone supervisor')->pluck('name','id')->all();

        $parks = Park::pluck('name','id')->all();

        return view('admin.zones.add',compact('parks','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ZoneRequest $request)
    {
        Zone::create
           (['name' => $request->input('name'),
            'park_id' => $request->input('park_id'),
            'zone_supervisor' => $request->input('zone_supervisor')
            ]);
        alert()->success('Zone Added successfully !');
        return redirect()->route('admin.zones.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parks = Park::pluck('name','id')->all();
        $zone=Zone::find($id);
        return view('admin.zones.edit',compact('parks','zone'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ZoneRequest $request, Zone $zone)
    {
        $zone->update($request->validated());
        $zone->save();

        alert()->success('zone updated successfully !');
        return redirect()->route('admin.zones.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zone=Zone::find($id);
        if ($zone){

            $zone->delete();
            alert()->success('zone deleted successfully');
            return back();
        }
        alert()->error('zone not found');
        return redirect()->route('admin.zones.index');
    }
}
