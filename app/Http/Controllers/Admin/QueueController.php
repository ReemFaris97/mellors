<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Queue\QueueRequest;
use App\Models\Park;
use App\Models\ParkTime;
use App\Models\User;
use App\Models\Queue;
use App\Models\Ride;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class QueueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Queue::where('opened_date', date('Y-m-d'))->get();
        return view('admin.queues.index',compact('items'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.queues.exce_upload');

    }
    public function add_queue($ride_id,$park_time_id)
    {
        $users=User::pluck('name','id')->toArray();
        return view('admin.queues.add',compact('users','ride_id','park_time_id'));

    }
    public function show_queues($ride_id,$park_time_id)
    {
        $items = Queue::where('park_time_id',$park_time_id)
                ->where('ride_id',$ride_id)->get();
        return view('admin.queues.index', compact('items', 'ride_id', 'park_time_id'));
    }
    public function uploadQueueExcleFile(Request $request)
    {
        Excel::import(new \App\Imports\RideQueues(), $request->file('file'));
        alert()->success('Ride Queues Added successfully !');
        return view('admin.queues.exce_upload');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QueueRequest $request)
    {
       // return $request;
       $park_time_id=$request->park_time_id;
       $ride_id=$request->ride_id;
        $park_time=ParkTime::findOrFail($park_time_id);
        $park_id=$park_time->park_id;
        $opened_date=$park_time->date;
        $data=$request->validated();
        $data['opened_date'] = $opened_date;
        $data['park_id'] = $park_id;
        Queue::create($data);

        alert()->success('Queue Added Successfully To The Ride !');

        return redirect()->route('admin.showQueues', ['ride_id'=>$ride_id,'park_time_id'=>$park_time_id]);

       // return view('admin.queues.index',compact('','ride_id','park_time_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GameTime  $GameTime
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GameTime  $GameTime
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GameTime  $GameTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Queue $queue)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GameTime  $GameTime
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $queue=Queue::find($id);
        if ($queue){
            $queue->delete();
            alert()->success('Queue deleted successfully');
            return back();
        }
        alert()->error('Queue not found');
        return redirect()->route('admin.queues.index');
    }

    public function search(Request $request){
        $ride_id = $request->input('ride_id');
        $park_time_id = $request->input('park_time_id');
        $date = $request->input('date');
        $items = Queue::query()
            ->where('ride_id',$ride_id)
            ->Where('opened_date', $date)
            ->get();
        return view('admin.queues.index', compact('items','ride_id','park_time_id'));
    }
}
