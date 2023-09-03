<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Dashboard\Accident\StatementRequest;
use Carbon\Carbon;
use App\Models\Park;
use App\Models\Ride;
use App\Models\Zone;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\GeneralIncident;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Accident\AccidentRequest;
use App\Http\Requests\Dashboard\Accident\IncidentRequest;

class StatementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = GeneralIncident::where('type','statement')->get();
        return view('admin.statement.index', compact('items'));
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
        $rides = Ride::pluck('name', 'id')->all();
        $departments = Department::pluck('name', 'id')->all();
        return view('admin.statement.add', compact('departments', 'parks', 'zones', 'rides'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatementRequest $request)
    {
        $data = $request->validated();
        $incident = GeneralIncident::create([
            'type' => 'statement',
            'status' => 'pending',
            'date' => Carbon::now(),
            'created_by_id' => auth()->user()->id,
            'value' => $data
        ]);
        if ($data['choose'] == 'ride') {
            $incident->ride_id = $data['ride_id'];
            $incident->park_id = $data['park_id'];
            $incident->zone_id = $data['zone_id'];
        }
        if ($data['choose'] == 'park') {
            $incident->park_id = $data['park_id'];

        }
        if ($data['choose'] == 'zone') {
            $incident->park_id = $data['park_id'];
            $incident->zone_id = $data['zone_id'];
        }
        if ($data['choose'] == 'general') {
            $incident->text = $data['text'];
            $incident->park_id = null;
            $incident->zone_id = null;
        }
        $incident->save();
        alert()->success('Witness Statement Added successfully !');
        return redirect()->route('admin.statement.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parks = Park::pluck('name', 'id')->all();
        $zones = Zone::pluck('name', 'id')->all();
        $rides = Ride::pluck('name', 'id')->all();
        $departments = Department::pluck('name', 'id')->all();
        $accident = GeneralIncident::find($id);
        return view('admin.statement.edit', compact('accident', 'departments', 'parks', 'zones', 'rides'));

    }
    public function show($id)
    {
        $departments = Department::pluck('name', 'id')->all();
        $accident = GeneralIncident::find($id);
        return view('admin.statement.show', compact('accident', 'departments'));

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StatementRequest $request, $id)
    {
        $data = $request->validated();
        $incident = GeneralIncident::findOrFail($id);
        $incident->update([
            'value' => $request->validated()
        ]);
        if ($data['choose'] == 'ride') {
            $incident->ride_id = $data['ride_id'];
            $incident->park_id = $data['park_id'];
            $incident->zone_id = $data['zone_id'];
        }
        if ($data['choose'] == 'park') {
            $incident->park_id = $data['park_id'];
        }
        if ($data['choose'] == 'zone') {
            $incident->park_id = $data['park_id'];
            $incident->zone_id = $data['zone_id'];
        }
        if ($data['choose'] == 'general') {
            $incident->park_id = null;
            $incident->zone_id = null;
            $incident->text = $data['text'];
        }
        $incident->save();
        alert()->success('Witness Statement updated successfully !');
        return redirect()->route('admin.statement.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accident = GeneralIncident::find($id);
        if ($accident) {
            $accident->delete();
            alert()->success('Witness Statement deleted successfully');
            return back();
        }
        alert()->error('Witness Statement Report not found');
        return redirect()->route('admin.statement.index');
    }

    public function approve($id)
    {
        $rsr = GeneralIncident::find($id);
        $rsr->status = 'approved';
        $rsr->approve_by_id  = \auth()->user()->id;
        $rsr->save();
        alert()->success('Witness Statement form Approved successfully !');
        return redirect()->route('admin.statement.index');
    }


}
