<?php

namespace App\Http\Controllers\Admin;

use App\Models\CustomerFeedbacks;
use App\Models\HealthAndSafetyReport;
use App\Models\SkillGameReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\InspectionList\PreopeningListRequest;
use App\Models\InspectionList;
use App\Models\Park;
use App\Models\ParkTime;
use App\Models\PreopeningList;
use App\Models\RedFlag;
use App\Models\Ride;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SkillGameReportController extends Controller
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
        }        return view('admin.reports.duty_report', compact('parks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $complaints = CustomerFeedbacks::where('type', 'Complaint')
            ->where('date', Carbon::now()->format('Y-m-d'))->count();
        return view('admin.skill_game_reports.add', compact('complaints'));
    }
    public function add_skill_game_report($park_id, $park_time_id)
    {
        $complaints = CustomerFeedbacks::where('type', 'Complaint')
            ->where('date', Carbon::now()->format('Y-m-d'))->count();
        return view('admin.skill_game_reports.add', compact('complaints', 'park_id', 'park_time_id'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dateExists = SkillGameReport::where([
            ['park_time_id', $request['park_time_id']],
            ['park_id', $request['park_id']]
        ])->first();
        if ($dateExists) {
            return response()->json(['error' => 'Skill Games Report Already Exist !']);
        }
        // dd($request->all());

        foreach ($request->question as $key => $value) {
            $list = new SkillGameReport();
            $list->question = $request->question[$key];
            $list->answer = $request->answer[$key];
            $list->comment = $request->comment[$key];
            $list->park_id = $request->park_id;
            $list->park_time_id = $request->park_time_id;
            $list->date = Carbon::now()->format('Y-m-d');
            $list->user_id = auth()->user()->id;
            $list->save();
        }
        foreach ($request->ride as $key=>$value){
            $listrf= new RedFlag();
            if($request->ride[$key] != null){
            $listrf->ride=$request->ride[$key];
            $listrf->issue=$request->issue[$key];
            $listrf->park_time_id=$request->park_time_id;
            $listrf->type='skill_games';
            $listrf->date=Carbon::now()->format('Y-m-d');
            $listrf->save();
            }
        }

        return response()->json(['success' => 'Skill Games Report Added successfully']);

        //        alert()->success('Preopening List Added successfully !');
        //        return redirect()->back();
    }
    public function search(Request $request)
    {
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
        $items=SkillGameReport::where('park_time_id',$parkTime->id)->get();
        $redFlags=RedFlag::query()->where('park_time_id',$parkTime->id)->where('type','skill_games')->get();
        return view('admin.reports.duty_report', compact('items','parks','redFlags'));
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

        return view('admin.preopening_lists.edit');
    }
    public function show($id)
    {

        return view('admin.preopening_lists.index');
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
        $preopening_list = SkillGameReport::find($id);
        if ($preopening_list) {

            $preopening_list->delete();
            alert()->success('Preopening List deleted successfully');
            return back();
        }
        alert()->error('Preopening List not found');
        return redirect()->route('admin.preopening_lists.index');
    }
}
