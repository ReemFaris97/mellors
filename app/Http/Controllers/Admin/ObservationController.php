<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Observation\ObservationRequest;
use App\Models\Department;
use App\Models\Observation;
use App\Traits\ImageOperations;


class ObservationController extends Controller
{
    use ImageOperations;

    public function index()
    {
        $items=Observation::where('date_resolved',Null)->get();
        return view('admin.observations.index',compact('items'));
    }

   
    public function create()
    {
        return view('admin.branches.add');
    }
    
    public function add_observation($ride_id)
    {
        $departments=Department::pluck('name','id');
        return view('admin.observations.add',compact('ride_id','departments'));
    }
    public function store(ObservationRequest $request)
    {
        $observation = new Observation();
        $observation->fill($request->validated());
        $observation->save();
        $observation_id = $observation->id;
    
        if ($request->has('image')) {
            $this->Images($request, $observation, ['observation_id' => $observation_id]);
        }
    
        alert()->success('Observation Added successfully !');
        return redirect()->back();
    }

   
    public function edit($id)
    {
        $observation=Observation::find($id);
        $departments=Department::pluck('name','id');
        return view('admin.observations.edit',compact('observation','departments'));

    }

   
    public function update(ObservationRequest $request, Observation $observation)
    {
        $observation->update($request->validated());
        $observation->save();

        alert()->success('Updated successfully !');
        return redirect()->route('admin.observations.index');
    }
  
    public function destroy($id)
    {
        $branch=Observation::find($id);
        if ($branch){
            $branch->delete();
            alert()->success('Branch deleted successfully');
            return back();
        }
        alert()->error('Branch not found');
        return redirect()->route('admin.branches.index');
    }
}

