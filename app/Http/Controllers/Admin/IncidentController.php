<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Incident\IncidentRequest;
use App\Models\Incident;
use App\Models\Park;
use App\Models\Ride;
use Carbon\Carbon;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Incident::where('date',Carbon::now()->format('Y-m-d'))->get();
       return view('admin.incidents.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $parks=auth()->user()->parks->all();
//        foreach ($parks as $park){
//            $parkRides=$park->rides->pluck('name','id')->all();
//        }
        $rides=Ride::pluck('name','id')->all();
        return view('admin.incidents.add',compact('rides'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncidentRequest $request)
    {
        Incident::create($request->validated());
        alert()->success('Incident Report Added successfully !');
        return redirect()->route('admin.incidents.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.incidents.edit')->with('incident',Incident::find($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IncidentRequest $request, Incident $incident)
    {
        $incident->update($request->validated());
        $incident->save();

        alert()->success('Incident Report updated successfully !');
        return redirect()->route('admin.incidents.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $incident=Branch::find($id);
        if ($incident){
            $incident->delete();
            alert()->success('Incident Report deleted successfully');
            return back();
        }
        alert()->error('Incident Report not found');
        return redirect()->route('admin.incidents.index');
    }
}
