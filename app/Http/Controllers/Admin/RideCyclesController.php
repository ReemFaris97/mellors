<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Ride\RideCycleRequest;
use App\Imports\RidesStoppageImport;
use App\Models\Park;
use App\Models\ParkTime;
use App\Models\Ride;
use App\Models\RideCycles;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RideCyclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = RideCycles::where('opened_date', date('Y-m-d'))->get();
        return view('admin.rides_cycles.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rides_cycles.exce_upload');
    }
    public function add_cycle($ride_id,$park_time_id)
    {
        $users=User::pluck('name','id')->toArray();
        return view('admin.rides_cycles.add',compact('users','ride_id','park_time_id'));

    }
    public function show_cycles($ride_id,$park_time_id)
    {
        $items = RideCycles::where('park_time_id',$park_time_id)
                ->where('ride_id',$ride_id)->get();
        return view('admin.rides_cycles.index', compact('items', 'ride_id', 'park_time_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RideCycleRequest $request)
    {

        $park_time_id=$request->park_time_id;
        $ride_id=$request->ride_id;
        $ride=Ride::findOrFail($ride_id);
        $zone_id=$ride->zone_id;
        $park_time=ParkTime::findOrFail($park_time_id);
        $park_id=$park_time->park_id;
        $opened_date=$park_time->date;
        $data=$request->validated();
        $data['opened_date'] = $opened_date;
        $data['park_id'] = $park_id;
        $data['zone_id'] = $zone_id;
        $data['user_id'] = auth()->user()->id;
        RideCycles::create($data);
        alert()->success('Ride Cycle Added successfully !');
        return redirect()->route('admin.showCycles', ['ride_id'=>$ride_id,'park_time_id'=>$park_time_id]);

    }


    public function uploadCycleExcleFile(Request $request)
    {
     
        Excel::import(new \App\Imports\RideCycles(), $request->file('file'));
        alert()->success('Ride Cycle Added successfully !');
        return view('admin.rides_cycles.exce_upload');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ride = RideCycles::find($id);
        if ($ride) {
            $ride->delete();
            alert()->success('Ride Cycle deleted successfully');
            return back();
        }
        alert()->error('Ride Cycle not found');
        return redirect()->route('admin.rides-cycles.index');
    }

    public function search(Request $request)
    {
        $ride_id = $request->input('ride_id');
        $park_time_id = $request->input('park_time_id');
        $date = $request->input('date');
        $items = RideCycles::query()
            ->where('ride_id', $ride_id)
            ->Where('opened_date', $date)
            ->get();
        return view('admin.rides_cycles.index', compact('items','ride_id','park_time_id'));
    }
}
