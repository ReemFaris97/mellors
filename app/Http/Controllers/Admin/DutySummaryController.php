<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HealthAndSafetyReport;
use App\Models\Park;
use App\Models\ParkTime;
use App\Models\RedFlag;
use App\Models\Ride;
use App\Models\RideOpsReport;
use App\Models\RsrReport;
use App\Models\TechReport;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
                $techData = [];
                $techData['rides down all day'] = TechReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','How many rides down all day?')->pluck('answer')->first();
                $techData['rides down due to maintenance'] = TechReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','How many rides are down due to maintenance?')->pluck('answer')->first();
                $techData['rides awaiting parts'] = TechReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','How many rides are down due to awaiting parts?')->pluck('answer')->first();
                $techData['rides awaiting approvals'] = TechReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','How many rides awaiting on approvals?')->pluck('answer')->first();
/* dd($techData);
 */             $healthData = [];
                $healthData['incidents'] = HealthAndSafetyReport::query()->where('park_time_id',$parkTime->id)
                ->where('question','How many rides down all day?')->pluck('answer')->first();   


            return view('admin.reports.duty_report', compact('techData','parks'));
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
