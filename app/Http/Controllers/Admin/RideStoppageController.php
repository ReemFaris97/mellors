<?php

namespace App\Http\Controllers\Admin;

use App\Events\StoppageEvent;
use App\Events\RideStatusEvent;
use App\Http\Controllers\Controller;
use App\Imports\RidesStoppageImport;
use App\Models\Ride;
use App\Models\RideStoppages;
use App\Models\rideStoppagesImages;
use App\Models\StopageCategory;
use App\Models\StopageSubCategory;
use App\Models\User;
use App\Traits\ImageOperations;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\Ride\RideStoppageRequest;
use App\Http\Requests\Dashboard\Ride\RideStoppageStatusRequest;
use App\Models\ParkTime;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class RideStoppageController extends Controller
{
    use ImageOperations;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('Technical')) {
            $items = RideStoppages::where('ride_status', 'stopped')
                ->where('opened_date', date('Y-m-d'))->get();
        } else {
            $items = RideStoppages::where('ride_status', 'stopped')->orwhere('opened_date', date('Y-m-d'))->get();
        }
       
        return view('admin.rides_stoppages.index', compact('items', 'stopage_category', 'stopage_sub_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.rides_stoppages.exce_upload');
    }

    public function add_stoppage($ride_id, $park_time_id)
    {
        $users = User::pluck('name', 'id')->toArray();
        $stopage_category = StopageCategory::pluck('name', 'id')->toArray();
        $stopage_sub_category = StopageSubCategory::pluck('name', 'id')->toArray();
        return view('admin.rides_stoppages.add', compact('users', 'ride_id', 'park_time_id', 'stopage_category', 'stopage_sub_category'));

    }

    public function show_stoppages($ride_id, $park_time_id)
    {
        $items = RideStoppages::where(function ($query) use ($park_time_id, $ride_id) {
            $query->where('park_time_id', $park_time_id)
                  ->where('type','time_slot')
                  ->where('ride_id', $ride_id);
        })->get(); 
        $all_day_stoppages= RideStoppages::where(function ($query) use ($ride_id) {
            $query->where('ride_id', $ride_id)
                  ->where('ride_status', 'stopped');
        })->latest()->first();   
            $stopage_category = StopageCategory::pluck('name', 'id')->toArray();
            $stopage_sub_category = StopageSubCategory::pluck('name', 'id')->toArray();
        return view('admin.rides_stoppages.index', compact('items','all_day_stoppages', 'ride_id', 'park_time_id', 'stopage_category', 'stopage_sub_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RideStoppageRequest $request)
    {
        
        // dd($request);
      //  \DB::beginTransaction();
        $park_time_id = $request->park_time_id;
        $ride_id = $request->ride_id;
        $ride = Ride::findOrFail($ride_id);
        $zone_id = $ride->zone_id;
        $park_time = ParkTime::findOrFail($park_time_id);
        $park_id = $park_time->park_id;
        $opened_date = $park_time->date;
        $duration = $park_time->duration_time;
        $data = $request->validated();
        $data['opened_date'] = $opened_date;
        $data['park_id'] = $park_id;
        $data['zone_id'] = $zone_id;
        $data['user_id'] = auth()->user()->id;
        $stoppageStartTime = Carbon::parse("$request->date $request->time_slot_start");
        $stoppageEndTime = Carbon::parse("$request->end_date $request->time_slot_end");
        $stoppageParkTimeEnd = Carbon::parse("$park_time->close_date $park_time->end");
        $stoppageParkTimeStart = Carbon::parse("$park_time->date $park_time->start");
        if($data['stoppage_status'] == "done"){
            $data['ride_status'] = "active";
            $data['down_minutes'] = $stoppageEndTime->diffInMinutes($stoppageStartTime);
        }
        else{
        $data['ride_status'] = "stopped";
        if ($data['type'] == 'all_day') {
            if($request->date === $park_time->date){
            $data['down_minutes'] = $duration;
            }else{
                alert()->error('Stoppage Start Date Is Incorrect !');
                return redirect()->back();
            }
        } else{
        
            if($stoppageStartTime >= $stoppageParkTimeStart){
            $data['down_minutes'] = $stoppageParkTimeEnd->diffInMinutes($stoppageStartTime);
            }else{
                alert()->error('Stoppage Time Is Incorrect !');
                return redirect()->back();
            }
        }
    }
        $data['time'] = Carbon::now()->toTimeString();
        $stoppage = RideStoppages::create($data);

        event(new RideStatusEvent($ride_id, $data['ride_status'],$stoppage->stopageSubCategory?->name));

        if ($request->has('images')) {
            $this->Gallery($request, new rideStoppagesImages(), ['ride_stoppages_id' => $stoppage->id]);
        }
     //   DB::commit();

        alert()->success('Ride Stoppage Added successfully !');

        return redirect()->route('admin.showStoppages', ['ride_id' => $ride_id, 'park_time_id' => $park_time_id]);
    }


    public function uploadStoppagesExcleFile(Request $request)
    {

        Excel::import(new RidesStoppageImport(), $request->file('file'));
        alert()->success('Ride Stoppage Added successfully !');
        return view('admin.rides_stoppages.exce_upload');
    }


    public function edit($id)
    {
        $item = RideStoppages::findOrFail($id);
        $park_time_id = $item->park_time_id;
        $ride_status = $item->ride_status;
        $rides = Ride::pluck('name', 'id')->all();
        $stopage_category = StopageCategory::pluck('name', 'id')->toArray();
        $stopage_sub_category = StopageSubCategory::pluck('name', 'id')->toArray();
        $users = User::pluck('name', 'id')->toArray();
        $album = $item->album;
        return view('admin.rides_stoppages.edit', compact('item', 'park_time_id', 'stopage_category', 'rides', 'stopage_sub_category', 'users', 'album'));

    }

    public function update(RideStoppageRequest $request, $id)
    {
        $item = RideStoppages::findOrFail($id);
        $ride_id = $item->ride_id;
        $data = $request->validated();
        $park_time = ParkTime::findOrFail($request['park_time_id']);
        $time_slot_end= $request['time_slot_end'];
        $data['ride_status']= $item['ride_status'];
        $data['opened_date']= $park_time->date;
        $data['park_time_id']= $request['park_time_id'];
        $time_slot_start= $request['time_slot_start'];
        $stoppageStartDate= $request['date'];
        $stopageEnddate=$request['end_date'];
        $stoppageStartTime = Carbon::parse("$stoppageStartDate $time_slot_start");
        $stoppageParkTimeEnd = Carbon::parse("$park_time->close_date $park_time->end");

        if ($data['type'] == 'all_day' && $request['stoppage_status'] == "working"){
            $data['down_minutes'] = $stoppageParkTimeEnd->diffInMinutes($stoppageStartTime);
            $data['ride_status']="stopped";

        } elseif ($data['type'] == 'time_slot' && $request['stoppage_status'] == "done") {
            $stopageEndTime=Carbon::parse("$stopageEnddate $time_slot_end");
            if($stopageEndTime <= $stoppageParkTimeEnd){
            $data['down_minutes'] = $stopageEndTime->diffInMinutes($stoppageStartTime);
            $data['ride_status']="active";
            }else{
                alert()->error('Stoppage End Time Is Incorrect !');
                return redirect()->back();
            }

        }
        // Update the ride stoppage with the new data
        $item->update($data);
        event(new RideStatusEvent($ride_id, $data['ride_status'],$item->stopageSubCategory?->name));

        if ($request->has('images')) {
            $this->Gallery($request, new rideStoppagesImages(), ['ride_stoppages_id' => $id]);
        }
        alert()->success('Ride Stoppage Updated successfully !');
        return redirect()->route('admin.showStoppages', ['ride_id' => $ride_id, 'park_time_id' => $request['park_time_id']]);

    }


    public function update_stoppage_status(RideStoppageStatusRequest $request, RideStoppages $rideStoppage)
    {
        $data = $request->validated();
        $oldStoppageData=RideStoppages::findOrFail($request['stoppage_id']);
        $data['park_id'] = $oldStoppageData->park_id;
        $data['zone_id'] = $oldStoppageData->zone_id;
        $data['ride_id'] = $oldStoppageData->ride_id;
        $park_time = ParkTime::where('date',date('Y-m-d'))->where('park_id',$data['park_id'] )->first();
        if(!($park_time)){
            alert()->error('Please, Set Time Slot First To Extend This Stoppage !');
            return redirect()->back();
                 } else{
            $data['park_time_id'] = $park_time->id;
            $duration = $park_time->duration_time;
            $data['down_minutes'] = $duration;
            $opened_date= $park_time->date;
            $data['opened_date'] =$opened_date ;
            $data['parent_id'] =$request['stoppage_id'] ;
            $data['stopage_category_id'] = $request['stopage_category_id'];
            $data['stopage_sub_category_id'] = $request['stopage_sub_category_id'];
            $data['user_id'] = auth()->user()->id;
        if ($request['stoppage_status'] === "done") {
            $data['ride_status'] = "active";
            $stopageEndTime=$request['time_slot_end'];
            $stopageEnddate=$request['end_date'];
            $parkTimeStart = Carbon::parse("$opened_date $park_time->start");
            $stoppageEnd = Carbon::parse("$stopageEnddate $stopageEndTime");
            $data['down_minutes'] = $stoppageEnd->diffInMinutes($parkTimeStart);
           
        } elseif ($request['stoppage_status'] === "working") {
            $data['ride_status'] = "stopped";
            if ($request['type'] == 'all_day') {
                $data['type']='all_day';
            }elseif ($request['type'] == 'time_slot') {
                $data['type']="time_slot";
                $data['time_slot_start']=$park_time->start;
            }
        }
        $stoppage = RideStoppages::create($data);
        }  
                     $stoppageSubCategoryName = '';
                     if ($data['stopage_sub_category_id']) {
                         $stoppageSubCategory = StopageSubCategory::find($data['stopage_sub_category_id']);
                         if ($stoppageSubCategory) {
                             $stoppageSubCategoryName = $stoppageSubCategory->name;
                         }
                     }
        event(new RideStatusEvent($data['ride_id'],  $data['ride_status'],$stoppageSubCategoryName));

        alert()->success('Stoppage Status ِAdded Successfully !');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $rideStoppages = RideStoppages::find($id);
        if ($rideStoppages) {

            $rideStoppages->delete();
            alert()->success('Row deleted successfully');
            return back();
        }
        alert()->error('Row not found');
        return redirect()->route('admin.rides-stoppages.index');
    }

    public function getImage(Request $request)
    {
        $x = $request->trCount;
        return view('admin.rides_stoppages.append_images', compact('x'));
    }

    public function search(Request $request)
    {
        $date = $request->input('date');
        $items = RideStoppages::query()
            ->Where('opened_date', $date)
            ->get();
        return view('admin.rides_stoppages.index', compact('items'));
    }
}
