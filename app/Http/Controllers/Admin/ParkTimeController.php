<?php

namespace App\Http\Controllers\Admin;

use App\Events\timeSlotNotification;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ParkTime\ParkTimeRequest;
use App\Http\Requests\Dashboard\ParkTime\EntranceCountRequest;
use App\Models\GameTime;
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

    public function index()
    {
        $times=[];
        $currentDate = Carbon::now()->toDateString();
        $currentTime = Carbon::now()->format('H:i');
        if (auth()->user()->hasRole('Super Admin')) {
            $items  = ParkTime::where('date', $currentDate)
                    ->orWhere(function ($subquery) use ($currentDate, $currentTime) {
                        $subquery->where('close_date', $currentDate)
                            ->where('end', '>=', $currentTime);
                    })->get();

            $items_check = ParkTime::where('date', $currentDate)
            ->orWhere(function ($subquery) use ($currentDate, $currentTime) {
                $subquery->where('close_date', $currentDate)
                    ->where('end', '>=', $currentTime);
            })->pluck('id');
        } else {
            $parks = auth()->user()->parks->pluck('id');
            $items = ParkTime::where('date', $currentDate)
            ->orWhere(function ($subquery) use ($currentDate, $currentTime) {
                $subquery->where('close_date', $currentDate)
                    ->where('end', '>=', $currentTime);
            })->whereIn('park_id', $parks)
            ->get();
            $items_check= ParkTime::where('date', $currentDate)
            ->orWhere(function ($subquery) use ($currentDate, $currentTime) {
                $subquery->where('close_date', $currentDate)
                    ->where('end', '>=', $currentTime);
            })->whereIn('park_id', $parks)->pluck('id');

        }
        $tech_data_exist=TechReport::wherein('park_time_id',$items_check)->distinct()->pluck('park_time_id')->toArray();
        $ops_data_exist=RideOpsReport::wherein('park_time_id',$items_check)->distinct()->pluck('park_time_id')->toArray();
        $maintenance_data_exist=MaintenanceReport::wherein('park_time_id',$items_check)->distinct()->pluck('park_time_id')->toArray();
        $skill_data_exist=SkillGameReport::wherein('park_time_id',$items_check)->distinct()->pluck('park_time_id')->toArray();
        $health_data_exist = HealthAndSafetyReport::wherein('park_time_id', $items_check)->distinct()->pluck('park_time_id')->toArray();

        return view('admin.park_times.index', compact('items','tech_data_exist','ops_data_exist','maintenance_data_exist','health_data_exist','skill_data_exist'));
    }



    public function create()
    {
        if (auth()->user()->hasRole('Super Admin')) {
            $parks = Park::pluck('name', 'id')->toArray();
        } else {
            $parks = auth()->user()->parks->pluck('name', 'id')->toArray();
        }
        return view('admin.park_times.add', compact('parks'));
    }


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
        $start_date=$data['date'];
        $end_date=$data['close_date'];

        $to_time = $data['start'];
        $from_time = $data['end'];
        $start_timestamp =  strtotime("$start_date $to_time");
        $end_timestamp = strtotime("$end_date $from_time");
        $data['duration_time']= round(abs($start_timestamp - $end_timestamp) / 60,2). " minute";
        $data['general_weather'] = $info->weather[0]->main;
        $data['description'] = $info->weather[0]->description;
        $data['temp'] = $info->main->temp;
        $data['windspeed_avg'] =$info->wind->speed;
        $parkTime = ParkTime::create($data);
        $lastInsertedId = $parkTime->id;

        $lists = GameTime::where('park_id', $request->park_id)
        ->where('date', $request['date'])
        ->get();
        
            foreach ($lists as $list) {
            $list->start = $request->input('start');
            $list->end = $request->input('end');
            $list->close_date = $data['close_date'];
            $list->park_time_id = $lastInsertedId;
            $list->save();
            }

            $date=[
                'user_name'=>auth()->user()->name,
                'start'=>$request->input('start'),
                'end'=>$request->input('end'),
                'date'=>$request->input('date'),
                'close_date'=>$request->input('close_date'),
            ];

            event(new timeSlotNotification($date));

        alert()->success('Time Slot And Weather Status Added successfully to the park !');
        return redirect()->route('admin.park_times.index');
    }

    public function search(Request $request){
        $date = $request->input('date');
        $items = ParkTime::query()
            ->Where('date', $date)
            ->get();
            if (auth()->user()->hasRole('Super Admin')) {
                $items_check = ParkTime::where('date', '>=', $date )->pluck('id');;
            } else {
                $parks = auth()->user()->parks->pluck('id');
                $items_check= ParkTime::where('date', '>=', $date )
                ->wherein('park_id', $parks)->pluck('id');

            }
            $tech_data_exist=TechReport::wherein('park_time_id',$items_check)->distinct()->pluck('park_time_id')->toArray();
            $ops_data_exist=RideOpsReport::wherein('park_time_id',$items_check)->distinct()->pluck('park_time_id')->toArray();
            $maintenance_data_exist=MaintenanceReport::wherein('park_time_id',$items_check)->distinct()->pluck('park_time_id')->toArray();
            $skill_data_exist=SkillGameReport::wherein('park_time_id',$items_check)->distinct()->pluck('park_time_id')->toArray();
            $health_data_exist = HealthAndSafetyReport::wherein('park_time_id', $items_check)->distinct()->pluck('park_time_id')->toArray();

            return view('admin.park_times.index', compact('items','tech_data_exist','ops_data_exist','maintenance_data_exist','health_data_exist','skill_data_exist'));
           }

    public function show(ParkTime $parkTime)
    {
        //
    }


    public function edit($id)
    {
        $time = ParkTime::find($id);
        $parks = Park::pluck('name', 'id')->all();
        return view('admin.park_times.edit', compact('parks', 'time'));
    }


    public function update(ParkTimeRequest $request, ParkTime $parkTime)
    {
        $data=$request->validated();
        $start_date=$data['date'];
        $end_date=$data['close_date'];

        $to_time = $data['start'];
        $from_time = $data['end'];
        $start_timestamp =  strtotime("$start_date $to_time");
        $end_timestamp = strtotime("$end_date $from_time");
        $data['duration_time']= round(abs($start_timestamp - $end_timestamp) / 60,2). " minute";
        $parkTime->update($data);
        alert()->success('Park Time Slot Updated successfully !');
        return redirect()->route('admin.park_times.index');
    }


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

