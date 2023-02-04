<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Queue\QueueRequest;
use App\Models\Park;
use App\Models\ParkTime;
use App\Models\Queue;
use App\Models\Ride;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Queue::all();
        return view('admin.queues.index',compact('items'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rides=Ride::pluck('name','id')->all();
        return view('admin.queues.add',compact('rides'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QueueRequest $request)
    {
        Queue::create($request->validated());
        alert()->success('Queue Added successfully to the Ride !');
        return redirect()->route('admin.queues.index');
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
    public function update(Request $request, GameTime $gameTime)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GameTime  $GameTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(GameTime $gameTime)
    {
        //
    }

    public function search(Request $request){
        $ride_id = $request->input('ride_id');
        $date = $request->input('date');
        $queues = Queue::query()
            ->where('ride_id',$ride_id)
            ->Where('date', $date)
            ->get();
        return view('admin.queues.index', compact('queues'));
    }
}
