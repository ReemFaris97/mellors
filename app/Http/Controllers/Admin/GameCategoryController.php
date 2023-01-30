<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\GameCategory\GameCategoryRequest;
use App\Models\GameCategory;
use Illuminate\Http\Request;

class GameCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=GameCategory::all();
        return view('admin.game_cats.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.game_cats.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameCategoryRequest $request)
    {
        GameCategory::create($request->validated());
        alert()->success('Game Category Added successfully !');
        return redirect()->route('admin.game_cats.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.game_cats.edit')->with('game_cats',GameCategory::find($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GameCategoryRequest $request, GameCategory $game_cats)
    {
        $game_cats->update($request->validated());
        $game_cats->save();

        alert()->success('Game Category updated successfully !');
        return redirect()->route('admin.game_cats.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game_cats=GameCategory::find($id);
        if ($game_cats){

            $game_cats->delete();
            alert()->success('Game Category deleted successfully');
            return back();
        }
        alert()->error('Game Category not found');
        return redirect()->route('admin.game_cats.index');
    }
}
