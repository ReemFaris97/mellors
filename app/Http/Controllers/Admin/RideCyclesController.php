<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Ride\RideCycleRequest;
use App\Imports\RidesStoppageImport;
use App\Models\Park;
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
        $items = RideCycles::all();
        return view('admin.rides_cycles.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rides = Ride::pluck('name', 'id')->all();
        $users = User::pluck('name', 'id')->toArray();
        $parks = Park::pluck('name', 'id')->toArray();
        return view('admin.rides_cycles.add', compact('rides', 'users', 'parks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RideCycleRequest $request)
    {
        $data = $request->validated();
        $ride = Ride::findOrFail($data['ride_id']);
        $time = $ride->park->parkTimes->first();
        $data['opened_date'] = $time->date;
        $data['user_id'] = auth()->user()->id;
        RideCycles::create($data);
        alert()->success('Ride Cycle Added successfully !');
        return redirect()->route('admin.rides-cycles.index');

    }


    public function uploadCycleExcleFile(Request $request)
    {
        Excel::import(new \App\Imports\RideCycles(), $request->file('file'));
        alert()->success('Ride Cycle Added successfully !');
        return redirect()->route('admin.rides-cycles.index');
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
        $date = $request->input('date');
        $items = RideCycles::query()
            ->where('ride_id', $ride_id)
            ->orWheredate('start_time', $date)
            ->get();
        return view('admin.rides_cycles.index', compact('items'));
    }
}
