<?php

namespace App\Http\Controllers\Admin;

use App\Models\HealthAndSafetyReport;
use App\Models\Incident;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\InspectionList\PreopeningListRequest;
use App\Models\Accident;
use App\Models\InspectionList;
use App\Models\Park;
use App\Models\ParkTime;
use App\Models\PreopeningList;
use App\Models\RedFlag;
use App\Models\Ride;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Validation\Rules\Exists;

class HealthAndSafetyReportController extends Controller
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
        }
       return view('admin.reports.duty_report',compact('parks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $incidents=Incident::where('Date(“created_at”)',Carbon::now()->format('Y-m-d'))->count();
        return view('admin.health_and_safety_reports.add',compact('incidents'));
    }
    
    public function add_health_and_safety_report($park_id,$park_time_id)
    {
        $incidents=Incident::where(("park_time_id"),$park_time_id)->count();
        $accidents=Accident::where(("park_time_id"),$park_time_id)->count();
        return view('admin.health_and_safety_reports.add',compact('accidents','incidents','park_id','park_time_id'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dateExists = HealthAndSafetyReport::where([
            ['park_time_id',$request['park_time_id']],
            ['park_id', $request['park_id']]
        ])->first();
        if ($dateExists){
            return response()->json(['error'=>'Health And Safety Report Already Exist !']);
        }

     // dd($request->all());

       foreach ($request->question as $key=>$value){
           $list= new HealthAndSafetyReport();
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
        $listrf->type='h&s';
        $listrf->date=Carbon::now()->format('Y-m-d');
        $listrf->save();
        }
    }
        return response()->json(['success'=>'Health And Safety Report Added successfully']);

//        alert()->success('Preopening List Added successfully !');
//        return redirect()->back();
    }
    public function search(Request $request){
        $health=[];
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
            $health=HealthAndSafetyReport::where('park_time_id',$parkTime->id)->get();
            $health['a'] = HealthAndSafetyReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','How many incident reports were created?')->first();
            $health['b'] = HealthAndSafetyReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','How many witness statements were taken?')->first();
            $health['c'] = HealthAndSafetyReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','How many near misses/accidents were reported?')->first();
            $health['d'] = HealthAndSafetyReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Any first aids required for Staff?')->first();
            $health['e'] = HealthAndSafetyReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Any first aids required for Customers?')->first();
            $health['f'] = HealthAndSafetyReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Have we had any abnormal evacuations? (time, medics etc)?')->first();
            $health['g'] = HealthAndSafetyReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','HSE Obsevation report completed?')->first();
            $health['h'] = HealthAndSafetyReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Any regulatory bodies visited the site i.e. police , ambulance , EHO etc?')->first();
            $health['i'] = HealthAndSafetyReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Has TUV undertaken any equipment inspections (harness, chains etc) or any assessments on plant been done?')->first();
            $health['j'] = HealthAndSafetyReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Has the information above been stored and uploaded to the server?')->first();
            $health['k'] = HealthAndSafetyReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Any trip or fall hazard reported?')->first();
            $health['l'] = HealthAndSafetyReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Any report of ill heath (COVID 19) etc?')->first();
            $health['m'] = HealthAndSafetyReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Do we require any medical supplies for the first aid bags?')->first();
            $health['n'] = HealthAndSafetyReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','How many permits have been completed?')->first();
            $health['o'] = HealthAndSafetyReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Staff team on duty including times:')->first();
            $health['p'] = HealthAndSafetyReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Any training/toolbox talks undertaken with the staff?')->first();
            $health['q'] = HealthAndSafetyReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Has a training attendance register been taken?')->first();
           
            $health['r'] = HealthAndSafetyReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Was any training programmes undertaken?')->first();
            $health['s'] = HealthAndSafetyReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','How many staff were trained (training programmes)?')->first();
            $health['t'] = HealthAndSafetyReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Has a training attendance register been taken?')->first();
           
            $health['u'] = HealthAndSafetyReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Has the training been inputed into the LMS system (Frog)?')->first();
            $health['v'] = HealthAndSafetyReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','How many Competency Assessments were undertaken?')->first();
            $health['w'] = HealthAndSafetyReport::query()->where('park_time_id',$parkTime->id)
            ->where('question','Additional comments:')->first();

            $redFlags=RedFlag::query()->where('park_time_id',$parkTime->id)->where('type','h&s')->get();
            return view('admin.reports.duty_report', compact('health','parks','redFlags'));
        }else
        return view('admin.reports.duty_report', compact('parks'));
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
