<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\RidesStoppageImport;
use App\Models\Ride;
use App\Models\RideStoppages;
use App\Models\StopageCategory;
use App\Models\StopageSubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\Ride\RideStoppageRequest;

use Maatwebsite\Excel\Facades\Excel;

class RideStoppageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('Technical')) {
            $items = RideStoppages::where('ride_status', 'stopped')
                ->where('opened_date',date('Y-m-d'))->get();
        }
        else{
            $items = RideStoppages::all();
        }
            return view('admin.rides_stoppages.index', compact('items'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rides = Ride::pluck('name', 'id')->all();;
        $stopage_category=StopageCategory::pluck('name','id')->toArray();
        $stopage_sub_category=StopageSubCategory::pluck('name','id')->toArray();
        $users=User::pluck('name','id')->toArray();
        return view('admin.rides_stoppages.add',compact('stopage_category','rides','stopage_sub_category','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RideStoppageRequest $request)
    {
        RideStoppages::create($request->validated());
        alert()->success('Ride Added successfully !');
        return redirect()->route('admin.rides-stoppages.index');
    }


    public function uploadStoppagesExcleFile(Request $request)
    {
        Excel::import(new RidesStoppageImport(), $request->file('file'));
        alert()->success('Ride Added successfully !');
        return redirect()->route('admin.rides-stoppages.index');
    }


    public function edit($id)
    {


    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rideStoppages=RideStoppages::find($id);
        if ($rideStoppages){

            $rideStoppages->delete();
            alert()->success('Row deleted successfully');
            return back();
        }
        alert()->error('Row not found');
        return redirect()->route('admin.rides-stoppages.index');
    }
}
