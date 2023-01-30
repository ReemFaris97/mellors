<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ParkTime\ParkTimeRequest;
use App\Http\Requests\Dashboard\ParkTime\EntranceCountRequest;
use App\Models\Park;
use App\Models\ParkTime;
use Illuminate\Http\Request;

class ParkTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=ParkTime::all();
        return view('admin.park_times.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parks = Park::pluck('name','id')->all();

        return view('admin.park_times.add',compact('parks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParkTimeRequest $request)
    {
        ParkTime::create([
            'start' => $request->input('start'),
            'end' => $request->input('end'),
            'date' => $request->input('date'),
            'park_id' => $request->input('park_id'),
            ]);
        alert()->success('Open and Clode tieme Added successfully to the park !');
        return redirect()->route('admin.park_times.index');
    }
public function constructor()
{
ddd();
}

    public function add_daily_entrance_count(EntranceCountRequest $request,ParkTime $parkTime)
    {
        return $request;
        $parkTime->update($request->validated());
        $parkTime->save();
        alert()->success('Daily Entrance Count Added successfully to the park !');
        return redirect()->route('admin.park_times.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ParkTime  $parkTime
     * @return \Illuminate\Http\Response
     */
    public function show(ParkTime $parkTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ParkTime  $parkTime
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $time=ParkTime::find($id);
        $parks = Park::pluck('name','id')->all();
        return view('admin.park_times.edit',compact('parks','time'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ParkTime  $parkTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParkTime $parkTime)
    {
        $parkTime->update($request->validated());
        $parkTime->save();

        alert()->success('Park Time updated successfully !');
        return redirect()->route('admin.park_times.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parkTime=ParkTime::find($id);
        if ($parkTime
        ){

            $parkTime->delete();
            alert()->success('Park Time deleted successfully');
            return back();
        }
        alert()->error('Park Time not found');
        return redirect()->route('admin.park_times.index');
    }
}
