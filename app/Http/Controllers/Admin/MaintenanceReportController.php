<?php

namespace App\Http\Controllers\Admin;

use App\Models\HealthAndSafetyReport;
use App\Models\MaintenanceRideStatusReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\InspectionList\PreopeningListRequest;
use App\Models\InspectionList;
use App\Models\MaintenanceReport;
use App\Models\Park;
use App\Models\ParkTime;
use App\Models\PreopeningList;
use App\Models\RedFlag;
use App\Models\Ride;
use App\Models\RideStoppages;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MaintenanceReportController extends Controller
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
        }       return view('admin.reports.duty_report',compact('parks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }
    
    public function add_maintenace_report($park_id,$park_time_id)
    {
        $rides=Ride::where('park_id',$park_id)->get();
        return view('admin.maintenance_reports.add',compact('rides','park_id','park_time_id'));
    }

    public function edit_maintenance_report($park_time_id)
    {
        $items=MaintenanceReport::where('park_time_id',$park_time_id)->get();
        $ride_status_items=MaintenanceRideStatusReport::where('park_time_id',$park_time_id)->get();
        $redFlags=RedFlag::query()->where('park_time_id',$park_time_id)->where('type','maintenance')->get();
        return view('admin.maintenance_reports.edit',compact('items','ride_status_items','park_time_id','redFlags'));
    }
    public function update_request(Request $request)
    {
/*         dd($request->all());
 */
    $items=MaintenanceReport::where('park_time_id',$request->park_time_id)
    ->delete();
    $items=MaintenanceRideStatusReport::where('park_time_id',$request->park_time_id)
    ->delete();
    $items=RedFlag::where('park_time_id',$request->park_time_id)->where('type','maintenance')
    ->delete();
       foreach ($request->question as $key=>$value){
           $list= new MaintenanceReport();
           $list->question=$request->question[$key];
           $list->answer=$request->answer[$key];
           $list->comment=$request->comment[$key];
           $list->park_time_id=$request->park_time_id;
           $list->date=Carbon::now()->format('Y-m-d');
           $list->user_id=auth()->user()->id;
           $list->save();
       }
       $maintenance_report_id=$list->id;
       foreach ($request->ride_id as $key=>$value){
        $listr= new MaintenanceRideStatusReport();
        $listr->ride_id=$request->ride_id[$key];
        $listr->status=$request->status[$key];
        $listr->comment=$request->ride_comment[$key];
        $listr->maintenance_report_id=$maintenance_report_id;
        $listr->park_time_id=$request->park_time_id;
        $listr->date=Carbon::now()->format('Y-m-d');
        $listr->save();
    }
       foreach ($request->ride as $key=>$value){
        $listrf= new RedFlag();
        if($request->ride[$key] != null){
        $listrf->ride=$request->ride[$key];
        $listrf->issue=$request->issue[$key];
        $listrf->park_time_id=$request->park_time_id;
        $listrf->type='maintenance';
        $listrf->date=Carbon::now()->format('Y-m-d');
        $listrf->save();
        }
    }
        alert()->success('Maintenance Report Updated  successfully !');
        return redirect()->route('admin.park_times.index');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dateExists = MaintenanceReport::where([
            ['park_time_id',$request['park_time_id']],
            ['park_id', $request['park_id']]
        ])->first();
        if ($dateExists){
            return response()->json(['error'=>'Maintenance  Report Already Exist !']);
        }
      //dd($request->all());

       foreach ($request->question as $key=>$value){
           $list= new MaintenanceReport();
           $list->question=$request->question[$key];
           $list->answer=$request->answer[$key];
           $list->comment=$request->comment[$key];
           $list->park_id=$request->park_id;
           $list->park_time_id=$request->park_time_id;
           $list->date=Carbon::now()->format('Y-m-d');
           $list->user_id=auth()->user()->id;
           $list->save();
       }
       $maintenance_report_id=$list->id;
       foreach ($request->ride_id as $key=>$value){
        $listr= new MaintenanceRideStatusReport();
        $listr->ride_id=$request->ride_id[$key];
        $listr->status=$request->status[$key];
        $listr->comment=$request->ride_comment[$key];
        $listr->maintenance_report_id=$maintenance_report_id;
        $listr->park_time_id=$request->park_time_id;
        $listr->date=Carbon::now()->format('Y-m-d');
        $listr->save();
    }
    foreach ($request->ride as $key=>$value){
        $listrf= new RedFlag();
        if($request->ride[$key] != null){
        $listrf->ride=$request->ride[$key];
        $listrf->issue=$request->issue[$key];
        $listrf->park_time_id=$request->park_time_id;
        $listrf->type='maintenance';
        $listrf->date=Carbon::now()->format('Y-m-d');
        $listrf->save();
        }
    }
        return response()->json(['success'=>'Maintenance Report Added successfully']);

//        alert()->success('Preopening List Added successfully !');
//        return redirect()->back();
    }
    public function search(Request $request){
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
            $maintenance['a'] = MaintenanceReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Are all rides working for operations?')->first();
            $maintenance['b'] = MaintenanceReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Any concerns found during routine maintenace?')->first();
            $maintenance['c'] = MaintenanceReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Any new routine preventative maintenance checks added to Opera?')->first();
            $maintenance['d'] = MaintenanceReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Any issues with Maintenance App?')->first();
            $maintenance['e'] = MaintenanceReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Any evacuations during operation?')->first();
            $maintenance['f'] = MaintenanceReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Additionl comments?')->first();
            
        $maintenanceRideStatus=MaintenanceRideStatusReport::query()->where('park_time_id',$parkTime->id)->get();
        $redFlags=RedFlag::query()->where('park_time_id',$parkTime->id)->where('type','maintenance')->get();
        return view('admin.reports.duty_report', compact('maintenance','parks','redFlags','maintenanceRideStatus'));
    }else
        return view('admin.reports.duty_report', compact('parks'));
    }
 
    public function show($id)
    {
        $items=MaintenanceReport::where('zone_id',$id)->get();

        return view('admin.preopening_lists.index',compact('items'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=MaintenanceReport::find($id);
        return view('admin.maintenance_reports.edit',compact('item'));

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaintenanceReport $maintenanceReport)
    {
        $maintenanceReport->update($request->all());
        $maintenanceReport->user_id=auth()->user()->id;
        $maintenanceReport->save();
        alert()->success('Maintenance Report updated successfully !');
        return redirect()->route('admin.park_times.index');    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=MaintenanceReport::find($id);
        if ($item){

            $item->delete();
            alert()->success('This Question  deleted successfully');
            return back();
        }
        alert()->error('This Question  not found');
        return redirect()->route('admin.park_times.index');
    }

    public function cheackMaintenance(Request $request)
    {
        $item=MaintenanceReport::where('park_time_id',$request->park_time_id)->first();
/*         dd($item);
 */        return response()->json(['item' => $item]);
    }
}
