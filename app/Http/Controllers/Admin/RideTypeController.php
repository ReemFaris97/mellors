<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\RideType\RideTypeRequest;
use App\Models\RideType;
use Illuminate\Http\Request;

class RideTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=RideType::all();
        return view('admin.ride_types.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ride_types.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RideTypeRequest $request)
    {
        RideType::create($request->validated());
        alert()->success('Ride Type  Added successfully !');
        return redirect()->route('admin.ride_types.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.ride_types.edit')->with('ride_types',RideType::find($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RideTypeRequest $request, $id)
    {
        $ride_types=RideType::find($id);
        $ride_types->update($request->validated());
        $ride_types->save();

        alert()->success('Ride Type updated successfully !');
        return redirect()->route('admin.ride_types.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ride_types=RideType::find($id);
        if ($ride_types){

            $ride_types->delete();
            alert()->success('Ride Type deleted successfully');
            return back();
        }
        alert()->error('Ride Type  not found');
        return redirect()->route('admin.ride_types.index');
    }
}
