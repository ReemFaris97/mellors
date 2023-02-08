<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Park\ParkRequest;
use Illuminate\Http\Request;
use App\Models\Branch;

use App\Models\Park;

class ParkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=auth()->user()->parks->all();
        return view('admin.parks.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::pluck('name','id')->all();

        return view('admin.parks.add',compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParkRequest $request)
    {
        Park::create(['name' => $request->input('name')
        ,'branch_id' => $request->input('branch_id')]);
        alert()->success('Park Added successfully !');
        return redirect()->route('admin.parks.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branches = Branch::pluck('name','id')->all();
        $park=Park::find($id);
        return view('admin.parks.edit',compact('branches','park'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ParkRequest $request, Park $park)
    {
        $park->update($request->validated());
        $park->save();

        alert()->success('park updated successfully !');
        return redirect()->route('admin.parks.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $park=Park::find($id);
        if ($park){

            $park->delete();
            alert()->success('park deleted successfully');
            return back();
        }
        alert()->error('park not found');
        return redirect()->route('admin.parks.index');
    }

    public function get_by_branch(Request $request)
    {
            $html = '';
            $parks = Park::where('branch_id', $request->branch_id)->get();
            foreach ($parks as $park) {
                $html .= '<option value="' . $park->id . '">' . $park->name . '</option>';
            }
        return response()->json(['html' => $html]);
    }
}
