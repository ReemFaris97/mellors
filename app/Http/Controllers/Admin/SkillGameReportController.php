<?php

namespace App\Http\Controllers\Admin;

use App\Models\CustomerFeedbacks;
use App\Models\HealthAndSafetyReport;
use App\Models\SkillGameReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\InspectionList\PreopeningListRequest;
use App\Models\InspectionList;
use App\Models\PreopeningList;
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
        $items=SkillGameReport::where('date',Carbon::now()->format('Y-m-d'))->get();
       return view('admin.skill_game_reports.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $complaints=CustomerFeedbacks::where('type','Complaint')
            ->where('date',Carbon::now()->format('Y-m-d'))->count();
        return view('admin.skill_game_reports.add',compact('complaints'));
    }
    public function add_skill_game_report($park_id,$park_time_id)
    { 
         $complaints=CustomerFeedbacks::where('type','Complaint')
        ->where('date',Carbon::now()->format('Y-m-d'))->count();
    return view('admin.skill_game_reports.add',compact('complaints','park_id','park_time_id'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      dd($request->all());

       foreach ($request->question as $key=>$value){
           $list= new SkillGameReport();
           $list->question=$request->question[$key];
           $list->answer=$request->answer[$key];
           $list->comment=$request->comment[$key];
           $list->park_id=$request->park_id[$key];
           $list->park_time_id=$request->park_time_id[$key];
           $list->date=Carbon::now()->format('Y-m-d');
           $list->user_id=auth()->user()->id;
           $list->save();
       }
        return response()->json(['success'=>'Skill Games Report Added successfully']);

//        alert()->success('Preopening List Added successfully !');
//        return redirect()->back();
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
