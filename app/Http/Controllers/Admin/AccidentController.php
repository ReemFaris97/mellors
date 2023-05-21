<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Accident\AccidentRequest;
use App\Models\Accident;
use App\Models\Park;
use App\Models\Ride;
use Carbon\Carbon;

class AccidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Accident::whereDate('created_at',Carbon::now()->format('Y-m-d'))->get();
       return view('admin.accidents.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rides=Ride::pluck('name','id')->all();
        return view('admin.incidents.add',compact('rides'));
    }
    
    public function add_accident_report($ride_id,$park_time_id)
    {
        return view('admin.accidents.add',compact('ride_id','park_time_id'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccidentRequest $request)
    {
        $data=$request->validated();
        $data['user_id']=auth()->user()->id;
        Accident::create($data);
        alert()->success('Accident Report Added successfully !');
        return redirect()->route('admin.accidents.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.accidents.edit')->with('accident',Accident::find($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccidentRequest $request, Accident $accident)
    {
        $accident->update($request->validated());
        $accident->save();

        alert()->success('Accident Report updated successfully !');
        return redirect()->route('admin.accidents.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accident=Accident::find($id);
        if ($accident){
            $accident->delete();
            alert()->success('Accident Report deleted successfully');
            return back();
        }
        alert()->error('Accident Report not found');
        return redirect()->route('admin.accidents.index');
    }
}
