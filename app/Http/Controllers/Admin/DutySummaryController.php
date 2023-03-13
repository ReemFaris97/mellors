<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accident;
use App\Models\HealthAndSafetyReport;
use App\Models\Incident;
use App\Models\MaintenanceReport;
use App\Models\Park;
use App\Models\ParkTime;
use App\Models\RedFlag;
use App\Models\Ride;
use App\Models\RideOpsReport;
use App\Models\RsrReport;
use App\Models\SkillGameReport;
use App\Models\TechReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RakibDevs\Weather\Weather;


class DutySummaryController extends Controller
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

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
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
                $wt = new Weather();
                $info= $wt->getCurrentByCity('Jeddah'); 
/*                  return $info;
 */                  $techData = [];
                $techData['How many rides have delayed opening?'] = TechReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','How many rides have delayed opening?')->pluck('answer')->first();
                $techData['rides down all day'] = TechReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','How many rides down all day?')->pluck('answer')->first();
                $techData['rides down due to maintenance'] = TechReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','How many rides are down due to maintenance?')->pluck('answer')->first();
                $techData['rides awaiting parts'] = TechReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','How many rides are down due to awaiting parts?')->pluck('answer')->first();
                $techData['rides awaiting approvals'] = TechReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','How many rides awaiting on approvals?')->pluck('answer')->first();
             
                $healthData = [];
                $healthData['incidents'] =Incident::where('park_time_id',$parkTime->id)->count();
                $healthData['accidents'] =Accident::where('park_time_id',$parkTime->id)->count();

                $maintenanceData = [];
                $maintenanceData['Any concerns found during routine maintenace'] = MaintenanceReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','Any concerns found during routine maintenace?')->pluck('answer')->first();
                $maintenanceData['Any evacuations during operation'] = MaintenanceReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','Any evacuations during operation?')->pluck('answer')->first();
                $maintenanceData['Any issues with Maintenance App'] = MaintenanceReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','Any issues with Maintenance App?')->pluck('answer')->first();
                $maintenanceData['Any issues with Maintenance App'] = MaintenanceReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','Any issues with Maintenance App?')->pluck('answer')->first();

                $skillGameData = [];
                $skillGameData['Any staff shortages'] = SkillGameReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','Any HB staff shortages?')->pluck('answer')->first();
                $skillGameData['HB staff unavailable?'] = SkillGameReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','HB staff unavailable?')->pluck('answer')->first();
                $skillGameData['Any Card reader issues?'] = SkillGameReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','Any Card reader issues?')->pluck('answer')->first();
                $skillGameData['Any Credit card issues?'] = SkillGameReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','Any Credit card issues?')->pluck('answer')->first();
                $skillGameData['Any incidents with staff?'] = SkillGameReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','Any incidents with staff?')->pluck('answer')->first();
                $skillGameData['Any theft?'] = SkillGameReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','Any theft?')->pluck('answer')->first();
                $skillGameData['Any complaints received?'] = SkillGameReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','Any complaints received?')->pluck('answer')->first();
                
                $ridesData = [];
                $ridesData['How many unavailable?'] = RideOpsReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','How many unavailable?')->pluck('answer')->first();
                $ridesData['How many rides have Breakdowns?'] = RideOpsReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','How many rides have Breakdowns?')->pluck('answer')->first();
                $ridesData['How many Evacuations?'] = RideOpsReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','How many Evacuations?')->pluck('answer')->first();
                $ridesData['How many stoppages?'] = RideOpsReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','How many stoppages?')->pluck('answer')->first();
                $ridesData['How many swipper Issues?'] = RideOpsReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','How many swipper Issues?')->pluck('answer')->first();

                $ridesRedFlag=RedFlag::query()->where('park_time_id',$parkTime->id)->where('type','ride_ops')->get();
                $healthRedFlag=RedFlag::query()->where('park_time_id',$parkTime->id)->where('type','h&s')->get();
                $skillRedFlag=RedFlag::query()->where('park_time_id',$parkTime->id)->where('type','skill_games')->get();
                $maintenanceRedFlag=RedFlag::query()->where('park_time_id',$parkTime->id)->where('type','maintenance')->get();
                $techRedFlag=RedFlag::query()->where('park_time_id',$parkTime->id)->where('type','tech')->get();
            
                return view('admin.reports.duty_report', compact('parkTime','techData','ridesData','maintenanceData',
                'skillGameData','healthData','parks','ridesRedFlag','healthRedFlag',
                'skillRedFlag','maintenanceRedFlag','techRedFlag','info'));
        }else
        return view('admin.reports.duty_report', compact('parks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('admin.tech_reports.edit');

    }

    public function show($id)
    {

        return view('admin.preopening_lists.index');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SkillGameReport $list)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
