<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Park;
use App\Models\ParkTime;
use App\Models\RedFlag;
use App\Models\Ride;
use App\Models\RsrReport;
use App\Models\TechReport;
use App\Models\TechRideDownReport;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TechReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('Super Admin')) {
            $parks = Park::pluck('name', 'id')->all();
        } else {
            $parks = auth()->user()->parks->pluck('name', 'id')->all();
        }
        return view('admin.reports.duty_report', compact('parks'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.tech_reports.add');
    }

    public function add_tech_report($park_id, $park_time_id)
    {
        $data = [];
        $data['rsr_count'] = RsrReport::whereDate('created_at', Carbon::today())->count();
        $data['ride_down_all_day'] = Ride::whereHas('rideStoppages', function ($query) {
            $query->whereDate('created_at', Carbon::today())->where('type', 'all_day');
        })->count();
        $data['ride_due_to_maintenance'] = Ride::whereHas('rideStoppages', function ($query) {
            $query->whereDate('created_at', Carbon::today());
        })->count();
        $rides_down=Ride::where('park_id',$park_id)->get();

        return view('admin.tech_reports.add', compact('rides_down','data', 'park_id', 'park_time_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $dateExists = TechReport::where([
            ['park_time_id', $request['park_time_id']],
            ['park_id', $request['park_id']]
        ])->first();
        if ($dateExists) {
            return response()->json(['error' => 'Tech Report Already Exist !']);
        }
        foreach ($request->question as $key => $value) {
            $list = new TechReport();
            $list->question = $request->question[$key];
            $list->answer = $request->answer[$key];
            $list->comment = $request->comment[$key];
            $list->park_id = $request->park_id;
            $list->park_time_id = $request->park_time_id;
            $list->date = Carbon::now()->format('Y-m-d');
            $list->user_id = auth()->user()->id;
            $list->save();
        }
        $tech_report_id=$list->id;
        foreach ($request->ride_down_id as $key=>$value){
         if($request->is_down[$key] == 'yes'){
         $listr= new TechRideDownReport();
         $listr->ride_down_id=$request->ride_down_id[$key];
         $listr->lead_name=$request->lead_name[$key];
         $listr->comment=$request->ride_down_comment[$key];
         $listr->tech_report_id=$tech_report_id;
         $listr->park_time_id=$request->park_time_id;
         $listr->date = Carbon::now()->format('Y-m-d');
         $listr->date_expected_open=$request->date[$key];
         
         $listr->save();
       //  dd($request->ride_down_id);
         }
     }

        foreach ($request->ride as $key=>$value){
            $listrf= new RedFlag();
            if($request->ride[$key] != null){
            $listrf->ride=$request->ride[$key];
            $listrf->issue=$request->issue[$key];
            $listrf->park_time_id=$request->park_time_id;
            $listrf->type='tech';
            $listrf->date=Carbon::now()->format('Y-m-d');
            $listrf->save();
            }
        }
        return response()->json(['success' => 'Tech Report Added successfully']);
    }


    public function search(Request $request)
    {
        $park_id=$request->input('park_id');
        $date=$request->input('date');
        $tech=[];
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
                $tech['a'] = TechReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','Was ride availabilty reports submitted on time?')->first();
                $tech['b'] = TechReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','How many RSR submitted today?')->first();
                $tech['c'] = TechReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','How many rides down all day?')->first();
                $tech['d'] = TechReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','How many rides are down due to maintenance?')->first();
                $tech['e'] = TechReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','How many rides are down due to awaiting parts?')->first();
                $tech['f'] = TechReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','How many rides awaiting on approvals?')->first();
                $tech['g'] = TechReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','How many rides have delayed opening?')->first();

                $techRideDown=TechRideDownReport::query()->where('park_time_id',$parkTime->id)->get();
            $redFlags=RedFlag::query()->where('park_time_id',$parkTime->id)->where('type','tech')->get();
            return view('admin.reports.duty_report', compact('tech','parks','redFlags','parkTime','techRideDown','park_id','date'));
        }else
        return view('admin.reports.duty_report', compact('parks','park_id','date'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {

        return view('admin.preopening_lists.index');

    }

    public function edit_tech_report($park_time_id)
    {
        $items=TechReport::where('park_time_id',$park_time_id)->get();
        $redFlags=RedFlag::query()->where('park_time_id',$park_time_id)->where('type','tech')->get();
        $park_time=ParkTime::findOrFail($park_time_id);
        $park_id=$park_time->park_id;
        $rides=Ride::where('park_id',$park_id)->get();
        $rides_down_items=TechRideDownReport::where('park_time_id',$park_time_id)->get();
        $rides_down_items_array=TechRideDownReport::where('park_time_id',$park_time_id)->pluck('ride_down_id')->toArray();
        return view('admin.tech_reports.edit',compact('items','park_time_id','rides_down_items_array','rides_down_items','redFlags','rides'));
    }
    public function update_request(Request $request)
    { 
      //  dd($request);
    $items=TechReport::where('park_time_id',$request->park_time_id)
    ->delete();
    $items=RedFlag::where('park_time_id',$request->park_time_id)->where('type','tech')
    ->delete();
    $items=TechRideDownReport::where('park_time_id',$request->park_time_id)
    ->delete();
    foreach ($request->question as $key => $value) {
        $list = new TechReport();
        $list->question = $request->question[$key];
        $list->answer = $request->answer[$key];
        $list->comment = $request->comment[$key];
        $list->park_id = $request->park_id;
        $list->park_time_id = $request->park_time_id;
        $list->date = Carbon::now()->format('Y-m-d');
        $list->user_id = auth()->user()->id;
        $list->save();
    }
    $tech_report_id=$list->id;
    foreach ($request->ride_down_id as $key=>$value){
     if($request->is_down[$key] == 'yes'){
     $listr= new TechRideDownReport();
     $listr->ride_down_id=$request->ride_down_id[$key];
     $listr->lead_name=$request->lead_name[$key];
     $listr->comment=$request->ride_down_comment[$key];
     $listr->tech_report_id=$tech_report_id;
     $listr->park_time_id=$request->park_time_id;
     $listr->date = Carbon::now()->format('Y-m-d');
     $listr->date_expected_open=$request->date_expected_open[$key];
     $listr->save();
   //  dd($request->ride_down_id);
     }
 }

    foreach ($request->ride as $key=>$value){
        $listrf= new RedFlag();
        if($request->ride[$key] != null){
        $listrf->ride=$request->ride[$key];
        $listrf->issue=$request->issue[$key];
        $listrf->park_time_id=$request->park_time_id;
        $listrf->type='tech';
        $listrf->date=Carbon::now()->format('Y-m-d');
        $listrf->save();
        }
    }
    alert()->success(' Tech Report Updated  successfully !');
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
 

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TechReport $techReport)
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
        $items=TechReport::where('park_time_id',$id)->get();
        if ($items){
            foreach($items as $item){
            $item->delete();
        }
        alert()->success('This Tech Report Deleted Successfully');
        return back();
    }
        alert()->error('This Tech Report  not found');
        return redirect()->route('admin.park_times.index');
    }

    public function cheackTech(Request $request)
    {
        $item=TechReport::where('park_time_id',$request->park_time_id)->first();
/*         dd($item);
 */        return response()->json(['item' => $item]);
    }
}
