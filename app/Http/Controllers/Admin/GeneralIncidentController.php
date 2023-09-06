<?php

namespace App\Http\Controllers\Admin;


use Carbon\Carbon;
use App\Models\Park;
use App\Models\Ride;
use App\Models\Zone;
use App\Models\Accident;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\GeneralIncident;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Accident\AccidentRequest;
use App\Http\Requests\Dashboard\Accident\IncidentRequest;

class GeneralIncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = GeneralIncident::where('type','incident')->get();
        return view('admin.general_incident.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->hasRole('Super Admin')) {
            $parks = Park::pluck('name', 'id')->all();
            $zones = Zone::pluck('name', 'id')->all();
            $rides = Ride::pluck('name', 'id')->all();

        }else {
            $parks = auth()->user()->parks->pluck('name', 'id')->all();
            $zones = auth()->user()->zones->pluck('name', 'id')->all();
            $rides = auth()->user()->rides->pluck('name', 'id')->all();
                }
        $departments = Department::pluck('name', 'id')->all();
        return view('admin.general_incident.add', compact('departments', 'parks', 'zones', 'rides'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncidentRequest $request)
    {
       // dd( $request);
        $data = $request->validated();
        $incident = GeneralIncident::create([
            'type' => 'incident',
            'status' => 'pending',
            'date' => $data['date'],
            'created_by_id' => auth()->user()->id,
            'value' => $data
        ]);
        if ($request['choose'] == 'ride') {
            $incident->ride_id = $data['ride_id'];
            $incident->park_id = $data['park_id'];
        }
        if ($request['choose'] == 'park') {
            $incident->park_id = $data['park_id'];
            $incident->ride_id = null;
            $incident->text = $data['text'];
        }
        $incident->save();
        alert()->success('Accident Incident  Report Added successfully !');
        return redirect()->route('admin.incident.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->hasRole('Super Admin')) {
            $parks = Park::pluck('name', 'id')->all();
            $zones = Zone::pluck('name', 'id')->all();
            $rides = Ride::pluck('name', 'id')->all();

        }else {
            $parks = auth()->user()->parks->pluck('name', 'id')->all();
            $zones = auth()->user()->zones->pluck('name', 'id')->all();
            $rides = auth()->user()->rides->pluck('name', 'id')->all();
                }
        $departments = Department::pluck('name', 'id')->all();
        $accident = GeneralIncident::find($id);
        return view('admin.general_incident.edit', compact('accident', 'departments', 'parks', 'zones', 'rides'));

    }
    public function show($id)
    {
        $departments = Department::pluck('name', 'id')->all();
        $accident = GeneralIncident::find($id);
        return view('admin.general_incident.show', compact('accident', 'departments'));

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IncidentRequest $request, $id)
    {
        $data = $request->validated();
        $incident = GeneralIncident::findOrFail($id);
        $incident->update([
            'value' => $request->validated(),
            'date' => $data['date']
        ]);
        if ($request['choose'] == 'ride') {
            $incident->ride_id = $data['ride_id'];
            $incident->park_id = $data['park_id'];
        }
        if ($request['choose'] == 'park') {
            $incident->park_id = $data['park_id'];
            $incident->ride_id = null;
            $incident->text = $data['text'];
        }
        $incident->save();
        alert()->success('Accident / incident updated successfully !');
        return redirect()->route('admin.incident.index');
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
            alert()->success('Incident Report deleted successfully');
            return back();
        }
        alert()->error('Incident Report not found');
        return redirect()->route('admin.incident.index');
    }

    public function getZones(Request $request)
    {
        $html = '<option value=""> Select Zone</option>';

        $parks = Zone::where('park_id', $request->bark_id)->get();
        foreach ($parks as $park) {
            $html .= '<option value="' . $park->id . '">' . $park->name . '</option>';
        }
        return response()->json(['html' => $html]);
    }
    public function getRides(Request $request)
    {
        $html = '';
        $parks = Park::find($request->park_id);

        foreach ($parks->rides as $ride) {
            $html .= '<option value="' . $ride->id . '">' . $ride->name . '</option>';
        }
        return response()->json(['html' => $html]);
    }

    public function approve($id)
    {
        $rsr = GeneralIncident::find($id);
        $rsr->status = 'approved';
        $rsr->approve_by_id  = \auth()->user()->id;
        $rsr->save();
        alert()->success('Incident form Approved successfully !');
        return redirect()->back();
    }

}
