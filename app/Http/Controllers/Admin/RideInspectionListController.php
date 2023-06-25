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
            $rides=Ride::all();
            $ride_inspect=Ride::all()->pluck('id');
        }else {
            $zones = auth()->user()->zones->pluck('id');
           // return $zones;
            $rides=Ride::wherein('zone_id', $zones)->get();
            $ride_inspect=Ride::wherein('zone_id', $zones)->pluck('id');
           // return  $rides;
        }
        $inspection_data_exist = RideInspectionList::where('lists_type','inspection_list')
        ->wherein('ride_id', $ride_inspect)->distinct()->pluck('ride_id')->toArray();
       
        $preopening_data_exist = RideInspectionList::where('lists_type','preopening')
        ->wherein('ride_id', $ride_inspect)->distinct()->pluck('ride_id')->toArray();
        
        $preclosing_data_exist = RideInspectionList::where('lists_type','preclosing')
        ->wherein('ride_id', $ride_inspect)->distinct()->pluck('ride_id')->toArray();
     
        return view('admin.ride_inspection_lists.index',compact('rides','preopening_data_exist','preclosing_data_exist','inspection_data_exist'));
    }

    public function create()
    {
   
    }
    public function add_ride_inspection_lists ($ride_id)
    {
        $inspection_list=InspectionList::all();
        return view('admin.ride_inspection_lists.add',compact('inspection_list','ride_id'));
    }
    
    public function edit_ride_inspection_lists( $ride_id)
    {
        $ride=Ride::find($ride_id);
        $list=RideInspectionList::where('ride_id',$ride_id)
        ->where('lists_type','inspection_list')->pluck('inspection_list_id')->toArray();
        $inspection_list=InspectionList::all();
        $rides=Ride::pluck('name','id')->toArray();    
        return view('admin.ride_inspection_lists.edit',compact('inspection_list','ride','list','ride_id'));

    }


    public function store(RideInspectionListRequest $request)
    {
        $ride = Ride::find($request['ride_id']);
        $inspectionListIds = $request['inspection_list_id'];
        $ride->inspection_list()->attach($inspectionListIds, ['lists_type' => 'inspection_list']);
        alert()->success('Ride Inspection Elements Added Successfully !');
        return redirect()->route('admin.ride_inspection_lists.index');
    }

   
    public function edit( $id)
    {
       

    }

  
    public function update_ride_inspection_lists(Request $request,  $ride_id)
    {
        RideInspectionList::where('ride_id',$request->ride_id) ->where('lists_type','inspection_list')->delete();
        $ride = Ride::find($request['ride_id']);
        $inspectionListIds = $request['inspection_list_id'];
        $ride->inspection_list()->attach($inspectionListIds, ['lists_type' => 'inspection_list']);
        alert()->success('Ride Inspection List Updated Successfully !');
        return redirect()->route('admin.ride_inspection_lists.index');
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
        $inspection_list=InspectionList::find($id);
        if ($inspection_list){

            $inspection_list->delete();
            alert()->success('Inspection element deleted successfully');
            return back();
        }
        alert()->error('department not found');
        return redirect()->route('admin.inspection_lists.index');
    }

    public function cheackRideInspectionList(Request $request)
    {
        $item=RideInspectionList::where('ride_id',$request->ride_id)->first();
/*         dd($item);
 */        return response()->json(['item' => $item]);
    }
}
