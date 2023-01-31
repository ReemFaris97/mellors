<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\GameTime\GameTimeRequest;
use App\Models\GameTime;
use App\Models\Park;
use App\Models\Game;
use App\Models\ParkTime;
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
        $items=Game::all();
        return view('admin.game_times.index',compact('items'));
    }

    public function all_times()
    {
        $items=GameTime::where('date',date('Y-m-d'))->get();
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
        GameTime::create($request->validated());
        alert()->success('Open and Clode tieme Added successfully to the Ride !');
        return redirect()->route('admin.game_times.index');
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
        $park_id=Game::where('id',$id)->pluck('park_id')->first();
        $time=ParkTime::where('park_id',$park_id)->where('date',date('Y-m-d'))->first();
        return view('admin.game_times.edit',compact('time','id'));


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
}
