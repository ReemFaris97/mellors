<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\InspectionList\PreopeningListRequest;
use App\Models\Game;
use App\Models\InspectionList;
use App\Models\PreopeningList;
use App\Models\Ride;
use App\Models\RideInspectionList;
use Illuminate\Support\Facades\Auth;

class PreopeningListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=PreopeningList::all();
       return view('admin.preopening_lists.index',compact('items'));
    }
    public function zone_rides($zone_id)
    {
        $rides=Ride::where('zone_id',$zone_id)->get();
        return view('admin.preopening_lists.zone_rides',compact('zone_id','rides'));
    }

    public function add_preopening_list_to_ride($id)
    {
       $inspections=RideInspectionList::where('ride_id',$id)->get();
//       return $inspections;
        return view('admin.preopening_lists.add',compact('inspections','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.preopening_lists.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request;
        $ride=Ride::find($request['ride_id']);
        $ride->preopening_list()->sync($request['comment']);
        $ride->preopening_list()->sync($request['inspection_element_id']);
        alert()->success('Preopening List Added successfully !');
        return redirect()->route('admin.zones.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=PreopeningList::find($id);
        $zone_id=$item->zone_id;
        $list = explode(",",$item->inspection_list);
        $rides=Ride::where('zone_id',$item->zone_id)->pluck('name','id')->all();
        $item=PreopeningList::find($id);
        $inspections=InspectionList::all();
        return view('admin.preopening_lists.edit',compact('rides','list','zone_id','item','inspections'));

    }
    public function show($id)
    {
        $items=PreopeningList::where('zone_id',$id)->get();

        return view('admin.preopening_lists.index',compact('items'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PreopeningListRequest $request, PreopeningList $preopening_list)
    {
        $preopening_list->update([
        'ride_id'=>$request->validated('ride_id'),
        'zone_id'=>$request->validated('zone_id'),
        'user_id' =>$request->validated('user_id'),
        'inspection_list'=>implode(',', (array) $request['inspection_list']),
        'comment'=>$request->validated('comment'),
        'date'=>$request->validated('date')
        ]);
        $preopening_list->save();

        alert()->success('Preopening List updated successfully !');
        return redirect()->route('admin.preopening_lists.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $preopening_list=PreopeningList::find($id);
        if ($preopening_list){

            $preopening_list->delete();
            alert()->success('Preopening List deleted successfully');
            return back();
        }
        alert()->error('Preopening List not found');
        return redirect()->route('admin.preopening_lists.index');
    }
}
