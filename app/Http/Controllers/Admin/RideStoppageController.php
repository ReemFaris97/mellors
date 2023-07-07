<?php

namespace App\Http\Controllers\Admin;

use App\Events\NewStoppageAdded;
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
            $items = RideStoppages::where('opened_date', date('Y-m-d'))->get();
        }
        return view('admin.rides_stoppages.index', compact('items'));
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
    public function add_stoppage($ride_id,$park_time_id)
    {
        $users=User::pluck('name','id')->toArray();
        $stopage_category = StopageCategory::pluck('name', 'id')->toArray();
        $stopage_sub_category = StopageSubCategory::pluck('name', 'id')->toArray();
        return view('admin.rides_stoppages.add',compact('users','ride_id','park_time_id','stopage_category','stopage_sub_category'));

    }
    public function show_stoppages($ride_id,$park_time_id)
    {
        $items = RideStoppages::where('park_time_id',$park_time_id)
                ->where('ride_id',$ride_id)->get();
        return view('admin.rides_stoppages.index', compact('items', 'ride_id', 'park_time_id'));
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
        \DB::beginTransaction();
        $park_time_id=$request->park_time_id;
        $ride_id=$request->ride_id;
        $ride=Ride::findOrFail($ride_id);
        $zone_id=$ride->zone_id;
        $park_time=ParkTime::findOrFail($park_time_id);
        $park_id=$park_time->park_id;
        $opened_date=$park_time->date;
        $duration=$park_time->duration_time;
        $data=$request->validated();
        $data['opened_date'] = $opened_date;
        $data['park_id'] = $park_id;
        $data['zone_id'] = $zone_id;
        $data['user_id']= auth()->user()->id;
        $data['ride_status']="stopped";
        if($data['type']=='all_day')
        {
            $data['down_minutes']=$duration;
        }else{
            $stoppageStartTime = Carbon::parse("$opened_date $request->time_slot_start");
            $stoppageParkTimeEnd = Carbon::parse("$park_time->close_date $park_time->end");
            $data['down_minutes']= $stoppageParkTimeEnd->diffInMinutes($stoppageStartTime);
        }
        $data['time']=Carbon::now()->toTimeString();
        $stoppage=RideStoppages::create($data);
        if ($request->has('images')) {
            $this->Gallery($request, new rideStoppagesImages(), ['ride_stoppages_id' =>$stoppage->id]);
        }
        DB::commit();
        event(new NewStoppageAdded($stoppage));

        alert()->success('Ride Stoppage Added successfully !');

        return redirect()->route('admin.showStoppages', ['ride_id'=>$ride_id,'park_time_id'=>$park_time_id]);
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
        $park_time_id= $item->park_time_id;
        $ride_status=$item->ride_status;
        $rides = Ride::pluck('name','id')->all();
        $stopage_category = StopageCategory::pluck('name','id')->toArray();
        $stopage_sub_category = StopageSubCategory::pluck('name','id')->toArray();
        $users = User::pluck('name', 'id')->toArray();
        $album=$item->album;
        return view('admin.rides_stoppages.edit', compact('item','park_time_id','stopage_category', 'rides', 'stopage_sub_category', 'users','album'));

    }

    public function update(RideStoppageRequest $request,$id)
    {
        $item = RideStoppages::findOrFail($id);
        $ride_id = $item->ride_id;
        $data = $request->validated();
        $data['ride_status'] = $item['ride_status'];
        $park_time = ParkTime::findOrFail($request['park_time_id']);
        $duration = $park_time->duration_time;
        
        if ($data['type'] == 'all_day') {
            $data['down_minutes'] = $duration;
        }
        else{
            $stoppageStartTime = Carbon::parse("$park_time->opened_date $request->time_slot_start");
            $stoppageParkTimeEnd = Carbon::parse("$park_time->close_date $park_time->end");
            $data['down_minutes']= $stoppageParkTimeEnd->diffInMinutes($stoppageStartTime);
        }
    
        if ($request['stoppage_status'] == "done") {
  // Get stoppage park time first part calculation
            $stoppageParkTime = ParkTime::find($item->park_time_id);
            $stoppageParkTimeEnd = Carbon::parse("$stoppageParkTime->close_date $stoppageParkTime->end");
   // dd($stoppageParkTimeEnd);
            $downtimeMinutes = 0;

  // Stoppage end date and time rhird part
            $time_slot_end = $request['time_slot_end'];
            $stoppage_end_date = Carbon::now()->format('Y-m-d');
    //get current parktime start time 
            $currentParkTime=ParkTime::where('date',$stoppage_end_date)->first();
            $currentParkTimeStart=$currentParkTime->start;
            $currentParkTimeId=$currentParkTime->id;
            $currentParkTimeStartTime = Carbon::parse("$stoppage_end_date $currentParkTimeStart");


            $stoppageStartTime = Carbon::parse("$item->opened_date $item->time_slot_start");
            $stoppageEndTime = Carbon::parse("$stoppage_end_date $time_slot_end");
    //stoppage updated to done in same day
         /*   if($currentParkTime->date === $item->opened_date ){
            $stoppageStartSameTime = Carbon::parse("$item->opened_date $item->time_slot_start");
            $stoppageEndSameTime = Carbon::parse("$item->opened_date $item->time_slot_end");
            $downtimeMinutes += $stoppageEndSameTime->diffInMinutes($stoppageStartSameTime);

           } */
            if ($currentParkTimeStartTime > $stoppageStartTime) {

                $ids = ParkTime::whereBetween('date', [$item->opened_date, $stoppage_end_date])->pluck('id');
                // Stoppage continues to the next park time
                $downtimeMinutes += $stoppageParkTimeEnd->diffInMinutes($stoppageStartTime);
                  //  return($downtimeMinutes);
                  $skipFirst = true;
                  $lastIndex = count($ids) - 1;
                  
                  foreach ($ids as $index => $id) {
                      if ($skipFirst) {
                          $skipFirst = false;
                          continue; // Skip the first iteration
                      }
                  
                      if ($index === $lastIndex) {
                          break; // Break out of the loop at the last iteration
                      }
                  
                      $nextParkTime = ParkTime::find($id);
                      $durationValue = (int) filter_var($nextParkTime->duration_time, FILTER_SANITIZE_NUMBER_INT);

                    //  dd($durationValue);
                      $downtimeMinutes += $durationValue;
                  }
                  $downtimeMinutes += $stoppageEndTime->diffInMinutes($currentParkTimeStartTime);
               
            } else {
                // Stoppage ends within the current park time
                $stoppageEndSameTime = Carbon::parse("$item->opened_date $item->time_slot_end");
                $downtimeMinutes = $stoppageEndSameTime->diffInMinutes($stoppageStartTime);
            }
    
            $data['ride_status'] = "active";
            $data['down_minutes'] = $downtimeMinutes;
            $data['stoppage_status'] = $request['stoppage_status'];
        }
    
        // Update the ride stoppage with the new data
        $item->update($data);
    

        if ($request->has('images')) {
            $this->Gallery($request, new rideStoppagesImages(), ['ride_stoppages_id' =>$id]);
        }
        alert()->success('Ride Stoppage Updated successfully !');
        return redirect()->route('admin.showStoppages', ['ride_id'=>$ride_id,'park_time_id'=>$request['park_time_id']]);

    }


    public function update_stoppage_status(RideStoppageStatusRequest $request, RideStoppages $rideStoppage)
    {
        if ($request['stoppage_status'] === "done"){
            $toUpdateColumns = ['stoppage_status' => $request['stoppage_status'],
            'description' => $request['description'],
            'ride_status'=>"active"
           ];
       
         }
         elseif ($request['stoppage_status']==="working" || $request['stoppage_status']==="pending"){
            $toUpdateColumns = ['stoppage_status' => $request['stoppage_status'],
            'description' => $request['description'],
            'ride_status'=>"stopped"
           ];
         }
      
        $res = RideStoppages::findOrFail($request->stoppage_id);
        $res->fill($toUpdateColumns);
        $res->save();
        alert()->success('Stoppage Status Updated successfully !');
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
    public function search(Request $request){
        $date = $request->input('date');
        $items = RideStoppages::query()
            ->Where('opened_date', $date)
            ->get();
        return view('admin.rides_stoppages.index', compact('items'));
    }
}
