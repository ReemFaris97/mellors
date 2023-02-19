<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\GameTime\GameTimeRequest;
use App\Models\GameTime;
use App\Models\Park;
use App\Models\Game;
use App\Models\ParkTime;
use App\Models\Ride;
use Illuminate\Http\Request;

class GameTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Ride::all();
        return view('admin.game_times.index',compact('items'));
    }

    public function all_times($id)
    {
        $items=GameTime::where('date',date('Y-m-d'))->get()->where('park_id',$id);
        return view('admin.game_times.all_games_times',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameTimeRequest $request)
    {  $dateExists = GameTime::where([
        ['date',$request['date']],
        ['ride_id', $request['ride_id']]
    ])->first();
        if ($dateExists){
            alert()->error(' Time Slot Already Exist !');
            return redirect()->back();
        }

        GameTime::create($request->validated());
        alert()->success('Time Slot Added Successfully to the Ride !');
        return redirect()->route('admin.game_times.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GameTime  $GameTime
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items=Ride::where('park_id',$id)->get();
        return view('admin.game_times.index',compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GameTime  $GameTime
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $park_id=Ride::where('id',$id)->pluck('park_id')->first();
        $time=ParkTime::where('park_id',$park_id)->where('date',date('Y-m-d'))->first();
        return view('admin.game_times.edit',compact('time','id','park_id'));


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
    public function destroy($id)
    {
        $gameTime=GameTime::find($id);
        if ($gameTime){

            $gameTime->delete();
            alert()->success('Open to Close Time  deleted successfully');
            return back();
        }
        alert()->error('GameTime not found');
        return redirect()->route('admin.game_times.index');
    }
}
