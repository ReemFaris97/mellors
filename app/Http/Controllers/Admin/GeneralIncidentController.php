<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Accident\AccidentRequest;
use App\Http\Requests\Dashboard\Accident\IncidentRequest;
use App\Models\Accident;
use App\Models\Department;
use App\Models\GeneralIncident;
use App\Models\Park;
use App\Models\Ride;
use Carbon\Carbon;

class GeneralIncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = GeneralIncident::get();
        return view('admin.general_incident.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::pluck('name', 'id')->all();
        return view('admin.general_incident.add', compact('departments'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncidentRequest $request)
    {
        $data = $request->validated();
        GeneralIncident::create([
            'type' => 'incident',
            'date' => Carbon::now(),
            'created_by_id' => auth()->user()->id,
            'value' => $data
        ]);
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
        $departments = Department::pluck('name', 'id')->all();
        $accident = GeneralIncident::find($id);
        return view('admin.general_incident.edit', compact('accident', 'departments'));

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

        $accident = GeneralIncident::findOrFail($id);
        $accident->update([
            'value' => $request->validated()
        ]);
        //  $accident->save();

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
}
