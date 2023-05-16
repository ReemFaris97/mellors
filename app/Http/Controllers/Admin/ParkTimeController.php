<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ParkTime\ParkTimeRequest;
use App\Http\Requests\Dashboard\ParkTime\EntranceCountRequest;
use App\Models\HealthAndSafetyReport;
use App\Models\MaintenanceReport;
use App\Models\Park;
use App\Models\ParkTime;
use App\Models\RideOpsReport;
use App\Models\SkillGameReport;
use App\Models\TechReport;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;
use RakibDevs\Weather\Weather;


class ParkTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $times=[];
        if (auth()->user()->hasRole('Super Admin')) {
            $items = ParkTime::where('date', Carbon::now()->format('Y-m-d'))->get();
            $items_check = ParkTime::where('date', Carbon::now()->format('Y-m-d'))->pluck('id');
        } else {
            $date = Carbon::now();
    // $from=date
    // $to=cosed
//currentbetween
            $parks = auth()->user()->parks->pluck('id');
            $items = ParkTime::where('date',Carbon::now()->format('Y-m-d'))
            ->wherein('park_id', $parks)->get();
            $items_check= ParkTime::where('date', '<=', $date)
            ->where('close_date', '>=', $date)
            ->wherein('park_id', $parks)->pluck('id');
        }
        //dd( $items);
        $tech_data_exist=TechReport::wherein('park_time_id',$items_check)->distinct()->pluck('park_time_id')->toArray();
        $ops_data_exist=RideOpsReport::wherein('park_time_id',$items_check)->distinct()->pluck('park_time_id')->toArray();
        $maintenance_data_exist=MaintenanceReport::wherein('park_time_id',$items_check)->distinct()->pluck('park_time_id')->toArray();
        $skill_data_exist=SkillGameReport::wherein('park_time_id',$items_check)->distinct()->pluck('park_time_id')->toArray();
        $health_data_exist = HealthAndSafetyReport::wherein('park_time_id', $items_check)->distinct()->pluck('park_time_id')->toArray();

        return view('admin.park_times.index', compact('items','tech_data_exist','ops_data_exist','maintenance_data_exist','health_data_exist','skill_data_exist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        if (auth()->user()->hasRole('Super Admin')) {
            $parks = Park::pluck('name', 'id')->toArray();
        } else {
            $parks = auth()->user()->parks->pluck('name', 'id')->toArray();
        }
        return view('admin.park_times.add', compact('parks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParkTimeRequest $request)
    {
        $dateExists = ParkTime::where([
            ['date', $request['date']],
            ['park_id', $request['park_id']]
        ])->first();
        if ($dateExists) {
            alert()->error(' Time Slot Already Exist !');
            return redirect()->back();
        }
        $park=Park::find( $request['park_id']);
        $city=$park->branches;
        $wt = new Weather();
        $info= $wt->getCurrentByCity($city['name']);

        $data=$request->validated();
        $to_time = strtotime($data['start']);
        $from_time = strtotime($data['end']);
        $data['general_weather'] = $info->weather[0]->main;
        $data['description'] = $info->weather[0]->description;
        $data['temp'] = $info->main->temp;
        $data['windspeed_avg'] =$info->wind->speed;
       // dd($data);
        $data['duration_time']= round(abs($to_time - $from_time) / 60,2). " minute";
        ParkTime::create($data);
        alert()->success('Time Slot And Weather Status Added successfully to the park !');
        return redirect()->route('admin.park_times.index');
    }

    public function search(Request $request){
        $date = $request->input('date');
        $items = ParkTime::query()
            ->Where('date', $date)
            ->get();
        return view('admin.park_times.index', compact('items'));
    }
    /**
     * Display the specified resource.
     *
     * @param \App\ParkTime $parkTime
     * @return \Illuminate\Http\Response
     */
    public function show(ParkTime $parkTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ParkTime $parkTime
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $time = ParkTime::find($id);
        $parks = Park::pluck('name', 'id')->all();
        return view('admin.park_times.edit', compact('parks', 'time'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ParkTime $parkTime
     * @return \Illuminate\Http\Response
     */
    public function update(ParkTimeRequest $request, ParkTime $parkTime)
    {
        $data=$request->validated();
        $to_time = strtotime($data['start']);
        $from_time = strtotime($data['end']);
        $data['duration_time']= round(abs($to_time - $from_time) / 60,2). " minute";
        $parkTime->update($data);
        alert()->success('Park Time Slot Updated successfully !');
        return redirect()->route('admin.park_times.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $parkTime = ParkTime::find($id);
        if ($parkTime) {
            $parkTime->delete();
            alert()->success('Park Time Slot deleted successfully');
            return back();
        }
        alert()->error('Park Time Slot not found');
        return redirect()->route('admin.park_times.index');
    }

    public function add_daily_entrance_count(EntranceCountRequest $request, ParkTime $parkTime)
    {
        $toUpdateColumns = ['daily_entrance_count' => $request['daily_entrance_count'],
                            'general_comment' => $request['general_comment']
                           ];
        $res = ParkTime::findOrFail($request->park_id);
        $res->fill($toUpdateColumns);
        $res->save();
        alert()->success('Daily entrance count added successfully !')->autoclose(50000);
        return redirect()->route('admin.park_times.index');
    }
}
