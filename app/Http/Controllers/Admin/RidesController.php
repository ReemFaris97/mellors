<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Game\GameRequest;
use App\Imports\RidesImport;
use App\Models\GameCategory;
use App\Models\Park;
use App\Models\Ride;
use App\Models\Zone;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Ride::all();
        return view('admin.rides.index', compact('items'));
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
        return view('admin.rides.add', compact('parks', 'zones', 'game_cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameRequest $request)
    {
        Ride::create($request->validated());
        alert()->success('Ride Added successfully !');
        return redirect()->route('admin.rides.index');
    }


    public function uploadExcleFile(Request $request)
    {
        $this->validate($request, ['file' => 'required']);
        Excel::import(new RidesImport(), $request->file('file'));
        alert()->success('Ride Added successfully !');
        return redirect()->route('admin.rides.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
