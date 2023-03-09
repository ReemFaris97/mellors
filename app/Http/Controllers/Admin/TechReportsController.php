<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Park;
use App\Models\ParkTime;
use App\Models\RedFlag;
use App\Models\Ride;
use App\Models\RsrReport;
use App\Models\TechReport;
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
        return view('admin.tech_reports.index', compact('parks'));
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

        return view('admin.tech_reports.add', compact('data', 'park_id', 'park_time_id'));
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
        // dd($request->all());

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
            $items=TechReport::where('park_time_id',$parkTime->id)->get();
            $redFlags=RedFlag::query()->where('park_time_id',$parkTime->id)->where('type','tech')->get();
            return view('admin.health_and_safety_reports.index', compact('items','parks','redFlags'));
        }else
        return view('admin.tech_reports.index', compact('parks'));
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

        return redirect()->route('admin.preopening_lists.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
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
