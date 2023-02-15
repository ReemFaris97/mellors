<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Ride\RsrReportRequest;
use App\Models\Ride;
use App\Models\RsrReport;
use Illuminate\Http\Request;
use App\Models\RsrReportsImages;
use Illuminate\Support\Facades\Auth;



class RsrReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.rsr_reports.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rides=Ride::pluck('name','id')->all();
        return view('admin.rsr_reports.add',compact('rides'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RsrReportRequest $request)
    {
        $rsrReport = new RsrReport();
        $rsrReport->ride_id = $request->input('ride_id');
        $rsrReport->ride_performance_details = $request->input('ride_performance_details');
        $rsrReport->ride_inspection = $request->input('ride_inspection');
        $rsrReport->corrective_actions_taken = $request->input('corrective_actions_taken');
        $rsrReport->conclusion = $request->input('conclusion');
        $rsrReport-> type = $request->input('type');
        $rsrReport-> date = $request->input('date');
        $rsrReport-> created_by_id = \auth()->user()->id;
        $rsrReport->save();
        $rsr_report_id=$rsrReport->id;
           if ($request->has('file')) {
                    $this->Gallery($request, new RsrReportsImages(), ['project_id' =>$rsr_report_id]);
                }
        alert()->success('RSR Report Added successfully !');
        return redirect()->route('admin.rsr_reports.index');
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
    public function update(RsrReportRequest $request, RsrReport $rsrReport)
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

    }
}
