<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Park;
use App\Models\ParkTime;
use App\Models\RedFlag;
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
        }        return view('admin.reports.duty_report',compact('parks'));
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
        foreach ($request->ride as $key=>$value){
            $listrf= new RedFlag();
            if($request->ride[$key] != null){
            $listrf->ride=$request->ride[$key];
            $listrf->issue=$request->issue[$key];
            $listrf->park_time_id=$request->park_time_id;
            $listrf->type='ride_ops';
            $listrf->date=Carbon::now()->format('Y-m-d');
            $listrf->save();
            }
        }
        return response()->json(['success'=>'Ride Ops Report Added successfully']);

//        alert()->success('Preopening List Added successfully !');
//        return redirect()->back();
    }
    public function search(Request $request){
        $rideops=[];
        $parkTime = ParkTime::query()
        ->where('park_id',$request->input('park_id'))
        ->Where('date', $request->input('date'))
        ->first();
        if (auth()->user()->hasRole('Super Admin')){
            $parks=Park::pluck('name','id')->all();
        }else{
            $parks=auth()->user()->parks->pluck('name','id')->all();
        }
        if($parkTime){

            $rideops['a'] = RideOpsReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Is weather monitoring equipment working correctly?')->first();
            $rideops['b'] = RideOpsReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Number of complaints received?')->first();
            $rideops['c'] = RideOpsReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Any medical assistance required?')->first();
            $rideops['d'] = RideOpsReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Any issues with ride scanners?')->first();
            $rideops['e'] = RideOpsReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','HOE Staff Late?')->first();
            $rideops['f'] = RideOpsReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','HOE Staff Unavailable?')->first();
            $rideops['g'] = RideOpsReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','How many unavailable rides?')->first();
            $rideops['h'] = RideOpsReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','How many Breakdowns?')->first();
            $rideops['i'] = RideOpsReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','How many rides have Breakdowns?')->first();
            $rideops['j'] = RideOpsReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','How many Evacuations?')->first();
            $rideops['k'] = RideOpsReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','How many stoppages?')->first();
            $rideops['l'] = RideOpsReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','How many swipper Issues?')->first();
        $redFlags=RedFlag::query()->where('park_time_id',$parkTime->id)->where('type','ride_ops')->get();
        return view('admin.reports.duty_report', compact('rideops','parks','redFlags'));
    }else

        return view('admin.reports.duty_report', compact('parks'));
    }
 

    public function show($id)
    {

        return view('admin.tech_reports.show');

    }
    public function edit_ride_ops_report($park_time_id)
    {
        $items=RideOpsReport::where('park_time_id',$park_time_id)->get();
        $redFlags=RedFlag::query()->where('park_time_id',$park_time_id)->where('type','ride_ops')->get();
        return view('admin.ride_ops_reports.edit',compact('items','park_time_id','redFlags'));
    }
    public function update_request(Request $request)
    {
/*         dd($request->all());
 */
    $items=RideOpsReport::where('park_time_id',$request->park_time_id)
    ->delete();
    $items=RedFlag::where('park_time_id',$request->park_time_id)->where('type','ride_ops')
    ->delete();
       foreach ($request->question as $key=>$value){
           $list= new RideOpsReport();
           $list->question=$request->question[$key];
           $list->answer=$request->answer[$key];
           $list->comment=$request->comment[$key];
           $list->park_time_id=$request->park_time_id;
           $list->date=Carbon::now()->format('Y-m-d');
           $list->user_id=auth()->user()->id;
           $list->save();
       }

       foreach ($request->ride as $key=>$value){
        $listrf= new RedFlag();
        if($request->ride[$key] != null){
        $listrf->ride=$request->ride[$key];
        $listrf->issue=$request->issue[$key];
        $listrf->park_time_id=$request->park_time_id;
        $listrf->type='ride_ops';
        $listrf->date=Carbon::now()->format('Y-m-d');
        $listrf->save();
        }
    }
        alert()->success('Ride Ops Report Updated  successfully !');
        return redirect()->route('admin.park_times.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=RideOpsReport::find($id);
        return view('admin.ride_ops_reports.edit',compact('item'));

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RideOpsReport $rideOpsReport)
    {
        $rideOpsReport->update($request->all());
        $rideOpsReport->user_id=auth()->user()->id;
        $rideOpsReport->save();
        alert()->success('Ride Ops Report updated successfully !');
        return redirect()->route('admin.park_times.index');  
      }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items=RideOpsReport::where('park_time_id',$id)->get();
        if ($items){
            foreach($items as $item){
            $item->delete();
        }
        alert()->success('This Ride Ops Report Report Deleted Successfully');
        return back();
    }
        alert()->error('This Ride Ops Report  not found');
        return redirect()->route('admin.park_times.index');
    }

    
    public function cheackRideOps(Request $request)
    {
        $item=RideOpsReport::where('park_time_id',$request->park_time_id)->first();
/*         dd($item);
 */        return response()->json(['item' => $item]);
    }
}
