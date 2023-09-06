<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Dashboard\Accident\StatementRequest;
use Carbon\Carbon;
use App\Models\Park;
use App\Models\Ride;
use App\Models\Zone;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\IncidentStatement;
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
    public function showStatment($incident_id){

        $items = IncidentStatement::where('incident_form_id',$incident_id)->get();
        return view('admin.statement.index', compact('items','incident_id'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addStatment($id)
    {
        $incident_id=$id ;
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
        return view('admin.statement.add', compact('departments', 'parks', 'zones', 'rides','incident_id'));
    }


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
        $incident_id =$request->incident_id;
        $data = $request->validated();
        $incident = IncidentStatement::create([
            'date' => Carbon::now(),
            'created_by_id' => auth()->user()->id,
            'value' => $data,
            'incident_form_id'=>$incident_id
        ]);
        $incident->save();
        alert()->success('Witness Statement Added successfully !');
        return redirect()->route('admin.showStatment', ['id' => $incident_id]);
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
        $accident = IncidentStatement::find($id);
        return view('admin.statement.edit', compact('accident', 'departments', 'parks', 'zones', 'rides'));

    }
    public function show($id)
    {
        $departments = Department::pluck('name', 'id')->all();
        $accident = IncidentStatement::find($id);
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
        $incident = IncidentStatement::findOrFail($id);
        $incident_id= $incident->incident_form_id;
        $incident->update([
            'value' => $request->validated()
        ]);
      
        $incident->save();
        alert()->success('Witness Statement updated successfully !');
        return redirect()->route('admin.showStatment', ['id' => $incident_id]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accident = IncidentStatement::find($id);
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
