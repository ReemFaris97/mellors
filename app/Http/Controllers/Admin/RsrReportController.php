<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Ride\RsrReportRequest;
use App\Models\Ride;
use App\Models\RsrReport;
use Illuminate\Http\Request;
use App\Models\RsrReportsImages;
use Illuminate\Support\Facades\Auth;

use App\Traits\ImageOperations;


class RsrReportController extends Controller
{
    use ImageOperations;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=RsrReport::all();
       return view('admin.rsr_reports.index',compact('items'));
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
               $this->Gallery($request, new RsrReportsImages(), ['rsr_report_id' =>$rsr_report_id]);
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
        $rsrReport=RsrReport::findorfail($id);
        $rides=Ride::pluck('name','id')->all();
        return view('admin.rsr_reports.edit',compact('rsrReport','rides'));
    }
    public function show($id)
    {
        $rsrReport=RsrReport::findorfail($id);
        return view('admin.rsr_reports.show',compact('rsrReport'));

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
        $rsrReport->update([
            'ride_id'=>$request->validated('ride_id'),
            'ride_performance_details'=>$request->validated('ride_performance_details'),
            'ride_inspection'=>$request->validated('ride_inspection'),
            'corrective_actions_taken'=>$request->validated('corrective_actions_taken'),
            'conclusion'=>$request->validated('conclusion'),
//            'type'=>$request->validated('type'),
            'date'=>$request->validated('date'),
            'status'=>'approved',
            'verified_by_id'=>\auth()->user()->id
    ]);
        $rsrReport->save();
        if ($request->has('file')) {
            RsrReportsImages::where('rsr_report_id',$rsrReport->id)->delete();
            $this->Gallery($request, new RsrReportsImages(), ['rsr_report_id' =>$rsrReport->id]);
        }
        alert()->success('RSR Report Updated successfully !');
        return redirect()->route('admin.rsr_reports.index');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rsr=RsrReport::find($id);
        if ($rsr){

            $rsr->delete();
            alert()->success('Rsr Report deleted successfully');
            return back();
        }
        alert()->error('Rsr Report not found');
        return redirect()->route('admin.rsr_reports.index');

    }
    public function approve($id)
    {
        $rsr=RsrReport::find($id);
        $rsr->status='approved';
        $rsr->verified_by_id=\auth()->user()->id;
        $rsr->save();
        alert()->success('RSR Report Approved successfully !');
        return redirect()->route('admin.rsr_reports.index');
    }
}
