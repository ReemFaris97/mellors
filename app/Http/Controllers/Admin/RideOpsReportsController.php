<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Park;
use App\Models\RideOpsReport;
use App\Models\TechReport;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RideOpsReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('Super Admin')){
            $parks=Park::pluck('name','id')->all();
        }else{
            $parks=auth()->user()->parks->pluck('name','id')->all();
        }        return view('admin.ride_ops_reports.index',compact('parks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.ride_ops_reports.add');
    }
    public function add_ride_ops_report($park_id,$park_time_id)
    {
        return view('admin.ride_ops_reports.add',compact('park_id','park_time_id'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dateExists = RideOpsReport::where([
            ['park_time_id',$request['park_time_id']],
            ['park_id', $request['park_id']]
        ])->first();
        if ($dateExists){
            return response()->json(['error'=>'ride ops report Report Already Exist !']);
        }
        // dd($request->all());

        foreach ($request->question as $key=>$value){
            $list= new RideOpsReport();
            $list->question=$request->question[$key];
            $list->answer=$request->answer[$key];
            $list->comment=$request->comment[$key];
            $list->park_id=$request->park_id;
            $list->park_time_id=$request->park_time_id;
            $list->date=Carbon::now()->format('Y-m-d');
            $list->user_id=auth()->user()->id;
            $list->save();
        }
        return response()->json(['success'=>'Ride Ops Report Added successfully']);

//        alert()->success('Preopening List Added successfully !');
//        return redirect()->back();
    }
    public function search(Request $request){
        $park_id = $request->input('park_id');
        $date = $request->input('date');
        $items = RideOpsReport::query()
            ->where('park_id',$park_id)
            ->Where('date', $date)
            ->get();
            if (auth()->user()->hasRole('Super Admin')){
                $parks=Park::pluck('name','id')->all();
            }else{
                $parks=auth()->user()->parks->pluck('name','id')->all();
            }
        return view('admin.ride_ops_reports.index', compact('items','parks','date'));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('admin.tech_reports.edit');

    }
    public function show($id)
    {

        return view('admin.tech_reports.show');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SkillGameReport $list)
    {

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
        $preopening_list=SkillGameReport::find($id);
        if ($preopening_list){

            $preopening_list->delete();
            alert()->success('Preopening List deleted successfully');
            return back();
        }
        alert()->error('Preopening List not found');
        return redirect()->route('admin.preopening_lists.index');
    }
}