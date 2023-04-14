<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ParkTime\ParkTimeRequest;
use App\Http\Requests\Dashboard\ParkTime\EntranceCountRequest;
use App\Models\Park;
use App\Models\ParkTime;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ParkTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('Super Admin')) {
            $items = ParkTime::where('date', Carbon::now()->format('Y-m-d'))->get();
        } else {
            $parks = auth()->user()->parks->all();
            $items = ParkTime::where('date', date('Y-m-d'))
            ->wherein('park_id', $parks)
            ->get();
        }

        return view('admin.park_times.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        if (auth()->user()->hasRole('Super Admin')) {
            $parks = Park::pluck('name', 'id')->toArray();
        } else {
            $parks = auth()->user()->parks->pluck('name', 'id')->toArray();
        }                                               
        return view('admin.park_times.add', compact('parks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParkTimeRequest $request)
    {
        $dateExists = ParkTime::where([
            ['date', $request['date']],
            ['park_id', $request['park_id']]
        ])->first();
        if ($dateExists) {
            alert()->error(' Time Slot Already Exist !');
            return redirect()->back();
        }
        $data=$request->validated();
        $to_time = strtotime($data['start']);
        $from_time = strtotime($data['end']);
        $data['duration_time']= round(abs($to_time - $from_time) / 60,2). " minute";
       ParkTime::create($data);
        alert()->success('Open and Close Time Added successfully to the park !');
        return redirect()->route('admin.park_times.index');
    }

    public function search(Request $request){
        $date = $request->input('date');
        $items = ParkTime::query()
            ->Where('date', $date)
            ->get();
        return view('admin.park_times.index', compact('items'));
    }
    /**
     * Display the specified resource.
     *
     * @param \App\ParkTime $parkTime
     * @return \Illuminate\Http\Response
     */
    public function show(ParkTime $parkTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ParkTime $parkTime
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $time = ParkTime::find($id);
        $parks = Park::pluck('name', 'id')->all();
        return view('admin.park_times.edit', compact('parks', 'time'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ParkTime $parkTime
     * @return \Illuminate\Http\Response
     */
    public function update(ParkTimeRequest $request, ParkTime $parkTime)
    {
        $data=$request->validated();
        $to_time = strtotime($data['start']);
        $from_time = strtotime($data['end']);
        $data['duration_time']= round(abs($to_time - $from_time) / 60,2). " minute";
        $parkTime->update($data);
        alert()->success('Park Time updated successfully !');
        return redirect()->route('admin.park_times.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $parkTime = ParkTime::find($id);
        if ($parkTime) {
            $parkTime->delete();
            alert()->success('Park Time deleted successfully');
            return back();
        }
        alert()->error('Park Time not found');
        return redirect()->route('admin.park_times.index');
    }

    public function add_daily_entrance_count(EntranceCountRequest $request, ParkTime $parkTime)
    {
        $toUpdateColumns = ['daily_entrance_count' => $request['daily_entrance_count'],
                            'general_comment' => $request['general_comment']
                           ];
        $res = ParkTime::findOrFail($request->park_id);
        $res->fill($toUpdateColumns);
        $res->save();
        alert()->success('daily entrance count added successfully !')->autoclose(50000);
        return redirect()->route('admin.park_times.index');
    }
}
