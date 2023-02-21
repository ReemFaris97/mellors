<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\InspectionList\RideInspectionListRequest;
use App\Models\InspectionList;
use App\Models\Ride;
use App\Models\RideInspectionList;

class RideInspectionListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('Super Admin')) {
            $items=Ride::all();
        }else {
            $zones = auth()->user()->zones->all();
            $items=Ride::whereIn('zone_id',$zones)->get();
        }
       return view('admin.ride_inspection_lists.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inspection_list=InspectionList::all();
        $rides=Ride::pluck('name','id')->toArray();
        return view('admin.ride_inspection_lists.add',compact('inspection_list','rides'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RideInspectionListRequest $request)
    {
        $ride=Ride::find($request['ride_id']);
        $ride->inspection_list()->sync($request['inspection_list_id']);
        alert()->success('Ride Inspection Elements Added Successfully !');
        return redirect()->route('admin.ride_inspection_lists.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $ride=Ride::find($id);
        $list=RideInspectionList::where('ride_id',$id)->pluck('inspection_list_id')->toArray();
        $inspection_list=InspectionList::all();
        $rides=Ride::pluck('name','id')->toArray();
//       return $list;
        return view('admin.ride_inspection_lists.edit',compact('inspection_list','rides','list','ride'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RideInspectionListRequest $request, RideInspectionList $inspection_list)
    {
        RideInspectionList::where('ride_id',$request->ride_id)->delete();
        $ride=Ride::find($request->ride_id);
        $ride->inspection_list()->sync($request['inspection_list_id']);

        alert()->success('Ride Inspection element updated successfully !');
        return redirect()->route('admin.ride_inspection_lists.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inspection_list=InspectionList::find($id);
        if ($inspection_list){

            $inspection_list->delete();
            alert()->success('Inspection element deleted successfully');
            return back();
        }
        alert()->error('department not found');
        return redirect()->route('admin.inspection_lists.index');
    }
}
