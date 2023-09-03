<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Accident\AccidentRequest;
use App\Http\Requests\Dashboard\Accident\InvestigationRequest;
use App\Models\Accident;
use App\Models\Department;
use App\Models\GeneralIncident;
use App\Models\Park;
use App\Models\Zone;
use App\Models\Ride;
use Carbon\Carbon;

class InvestigationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = GeneralIncident::where('type','investigation')->get();
        return view('admin.investigation.index', compact('items'));
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
        return view('admin.investigation.add', compact('departments', 'parks', 'zones', 'rides'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvestigationRequest $request)
    {       
         $data = $request->validated();
            $incident = GeneralIncident::create([
                'type' => 'investigation',
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
        alert()->success('Incident Investigation Report Added successfully !');
        return redirect()->route('admin.investigation.index');
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
        return view('admin.investigation.edit', compact('accident', 'departments','parks','zones','rides'));

    }
    public function show($id)
    {
        $departments = Department::pluck('name', 'id')->all();
        $accident = GeneralIncident::find($id);
        return view('admin.investigation.show', compact('accident', 'departments'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InvestigationRequest $request, $id)
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

        alert()->success('Investigation form updated successfully !');
        return redirect()->route('admin.investigation.index');
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
            alert()->success('Investigation Report deleted successfully');
            return back();
        }
        alert()->error('Investigation Report not found');
        return redirect()->route('admin.investigation.index');
    }

    public function approve($id)
    {
        $rsr = GeneralIncident::find($id);
        $rsr->status = 'approved';
        $rsr->approve_by_id  = \auth()->user()->id;
        $rsr->save();
        alert()->success('Investigation form Approved successfully !');
        return redirect()->route('admin.investigation.index');
    }
}
