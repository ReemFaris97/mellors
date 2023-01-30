<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Game\GameRequest;

use App\Models\Game;
use App\Models\GameCategory;
use App\Models\Park;
use App\Models\Zone;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Game::all();
        return view('admin.games.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parks = Park::pluck('name', 'id')->all();
        $zones = Zone::pluck('name', 'id')->all();
        $game_cats = GameCategory::pluck('name', 'id')->all();

        return view('admin.games.add', compact('parks', 'zones', 'game_cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameRequest $request)

    {
        Game::create($request->validated());
        alert()->success('Game Added successfully !');
        return redirect()->route('admin.games.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $game =Game::find($id);
        $parks = Park::pluck('name', 'id')->all();
        $zones = Zone::pluck('name', 'id')->all();
        $game_cats = GameCategory::pluck('name', 'id')->all();

        return view('admin.games.edit',compact('game','parks','zones','game_cats'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(GameRequest $request, Game $game)
    {
        $game->update($request->validated());
        alert()->success('Game updated successfully !');
        return redirect()->route('admin.games.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game = Game::find($id);
        if ($game)
        {

            $game->delete();
            alert()->success('Game deleted successfully');
            return back();
        }
        alert()->error('Game not found');
        return redirect()->route('admin.games.index');
    }
}
