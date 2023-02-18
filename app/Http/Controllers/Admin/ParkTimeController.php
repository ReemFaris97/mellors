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
        if (auth()->user()->hasRole('Super Admin')) {
            $items= ParkTime::where('date', date('Y-m-d'))->get();
        }
        else{
            $parks=auth()->user()->parks->all();
            $items= ParkTime::where('date', date('Y-m-d'))
                ->wherein('park_id', $parks)->get();
        }

        return view('admin.park_times.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parks=auth()->user()->parks->pluck('name','id')->toArray();

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
        ParkTime::create($request->validated());
        alert()->success('Open and Close Time Added successfully to the park !')->autoclose(50000);
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
    public function update(ParkTimeRequest $request, ParkTime $parkTime)
    {
        $parkTime->update($request->validated());
        $parkTime->save();

        alert()->success('Park Time updated successfully !')->autoclose(50000);
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
            alert()->success('Park Time deleted successfully')->autoclose(50000);
            return back();
        }
        alert()->error('Park Time not found')->autoclose(50000);
        return redirect()->route('admin.park_times.index');
    }

    public function add_daily_entrance_count(ParkTimeRequest $request, ParkTime $parkTime)
    {
        $toUpdateColumns = ['daily_entrance_count' => $request['daily_entrance_count']];
        $res = ParkTime::findOrFail($request->park_id);
        $res->fill($toUpdateColumns);
        $res->save();
        alert()->success('daily entrance count added successfully !')->autoclose(50000);
        return redirect()->route('admin.park_times.index');
    }
}
