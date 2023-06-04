<?php

namespace App\Http\Controllers\Admin;

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
        }
        $data['time']=Carbon::now()->toTimeString();
        $stoppage=RideStoppages::create($data);
        if ($request->has('images')) {
            $this->Gallery($request, new rideStoppagesImages(), ['ride_stoppages_id' =>$stoppage->id]);
        }
        DB::commit();
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
//dd($request);
        $item = RideStoppages::findOrFail($id);
        $ride_id=$item->ride_id;
        $data=$request->validated();
        $park_time=ParkTime::findOrFail($request['park_time_id']);
        $duration=$park_time->duration_time;
        if($data['type']=='all_day')
        {
            $data['down_minutes']=$duration;
        }
/*         if ( $data['stoppage_status']="working" && $request->ride_status == "stopped"){
            $data['stoppage_status']="working";
        }elseif ($request->ride_status == "active"){
            $data['stoppage_status']="done";
        } */
        if ( $data['stoppage_status']="working" || $data['stoppage_status']="pending"){
            $data['ride_status']="stopped";
            $data['stoppage_status']=$request['stoppage_status'];
        }else{
            $data['ride_status']="active";
            $data['down_minutes']="0";
            $data['stoppage_status']=$request['stoppage_status'];

        }
        $item->update($data);

        if ($request->has('images')) {
            $this->Gallery($request, new rideStoppagesImages(), ['ride_stoppages_id' =>$id]);
        }
        alert()->success('Ride Stoppage Updated successfully !');
        return redirect()->route('admin.showStoppages', ['ride_id'=>$ride_id,'park_time_id'=>$request['park_time_id']]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
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
        $ride_id = $request->input('ride_id');
        $park_time_id = $request->input('park_time_id');
        $date = $request->input('date');
        $items = RideStoppages::query()
            ->where('ride_id',$ride_id)
            ->Where('opened_date', $date)
            ->get();
        return view('admin.rides_stoppages.index', compact('items','ride_id','park_time_id'));
    }
}
