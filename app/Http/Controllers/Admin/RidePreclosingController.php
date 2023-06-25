<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\InspectionList\RideInspectionListRequest;
use App\Models\InspectionList;
use App\Models\Ride;
use Illuminate\Http\Request;
use App\Models\RideInspectionList;
use Carbon\Carbon;

class RidePreclosingController extends Controller
{
   
    public function index()
    {
    }

   
    public function create()
    {
    }
  
       public function add_ride_preclose_elements($ride_id)
    {
        $inspection_list=InspectionList::all();
        return view('admin.ride_preclosing.add',compact('inspection_list','ride_id'));
    }
    
    public function edit_ride_preclose_elements( $ride_id)
    {
        $ride=Ride::find($ride_id);
        $list=RideInspectionList::where('ride_id',$ride_id)
        ->where('lists_type','preclosing')->pluck('inspection_list_id')->toArray();
        $inspection_list=InspectionList::all();
        $rides=Ride::pluck('name','id')->toArray();    
        return view('admin.ride_preclosing.edit',compact('inspection_list','ride','list','ride_id'));

    }

    public function store(RideInspectionListRequest $request)
    {
        $ride = Ride::find($request['ride_id']);
        $inspectionListIds = $request['inspection_list_id'];
        $ride->inspection_list()->attach($inspectionListIds, ['lists_type' => 'preclosing']);
         alert()->success('Ride Preclosing Elements Added Successfully !');
        return redirect()->route('admin.ride_inspection_lists.index');
    }

    public function update_ride_preclose_elements(Request $request,  $ride_id)
    {
        RideInspectionList::where('ride_id',$request->ride_id) ->where('lists_type','preclosing')->delete();
        $ride = Ride::find($request['ride_id']);
        $inspectionListIds = $request['inspection_list_id'];
        $ride->inspection_list()->attach($inspectionListIds, ['lists_type' => 'preclosing']);
        alert()->success('Ride Preclosing Elements Updated Successfully !');
        return redirect()->route('admin.ride_inspection_lists.index');
    }
   
    public function edit( $id)
    {
       

    }

    public function update(RideInspectionListRequest $request, RideInspectionList $rideInspectionList)
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
    }


}
