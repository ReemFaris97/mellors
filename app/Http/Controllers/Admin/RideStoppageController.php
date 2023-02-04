<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\RidesImport;
use App\Imports\RidesStoppageImport;
use App\Models\Ride;
use App\Models\RideStoppages;
use Illuminate\Http\Request;
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
        $items=RideStoppages::all();
        return view('admin.rides_stoppages.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.rides_stoppages.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Excel::import(new RidesStoppageImport(), $request->file('file'));
        alert()->success('Ride Added successfully !');
        return redirect()->route('admin.rides-stoppage.index');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
