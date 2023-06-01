<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\GameTime\GameTimeRequest;
use App\Models\GameTime;
use App\Models\Park;
use App\Models\Game;
use App\Models\ParkTime;
use App\Models\Ride;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    {  
        $dateExists = GameTime::where([
            ['park_time_id',$request['park_time_id']],
            ['ride_id',$request['ride_id']]
        ])->first();
        if ($dateExists){
            $gametime = GameTime::where([
                ['park_time_id',$request['park_time_id']],
                ['ride_id',$request['ride_id']]
            ])->first();
            $gametime->update($request->validated());
            alert()->success('Ride Time Slot Updated Successfully !');
                }else{
                    GameTime::create($request->validated());
                    alert()->success('Time Slot Added Successfully to the Ride !');
                     }
        return redirect()->route('admin.park_times.index');
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
    public function all_rides($park_id,$park_time_id)
    {
        $items=Ride::where('park_id',$park_id)->get();
        if (auth()->user()->hasRole('Super Admin')) {
            $zones=Zone::pluck('id');
        }else {
            $zones = auth()->user()->zones->pluck('id'); 
                }       
        $zone_rides=Ride::wherein('zone_id', $zones)->pluck('id')->toArray();
        return view('admin.game_times.index',compact('items','park_time_id','zone_rides'));
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
        $time=ParkTime::where('park_id',$park_id)->first();
        return view('admin.game_times.edit',compact('time','id','park_id'));

    }
    
    public function edit_ride_time($ride_id,$park_time_id)
    {
        $dateExists = GameTime::where([
            ['park_time_id',$park_time_id],
            ['ride_id',$ride_id]
        ])->first();
        if ($dateExists){
            $time=GameTime::where('park_time_id',$park_time_id)->where('ride_id',$ride_id)->first();
        }else{
        $time=ParkTime::findOrFail($park_time_id);
        }
        return view('admin.game_times.edit',compact('time','park_time_id','ride_id'));

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
            alert()->success('Time Slot deleted successfully');
            return back();
        }
        alert()->error('GameTime not found');
        return redirect()->route('admin.game_times.index');
    }
}
