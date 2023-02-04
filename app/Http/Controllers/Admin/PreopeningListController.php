<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\InspectionList\PreopeningListRequest;
use App\Models\Game;
use App\Models\InspectionList;
use App\Models\PreopeningList;
use App\Models\Ride;
use Illuminate\Support\Facades\Auth;

class PreopeningListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=PreopeningList::all();
       return view('admin.preopening_lists.index',compact('items'));
    }

    public function add_preopening_list($zone_id)
    {
        $rides=Ride::where('zone_id',$zone_id)->pluck('name','id')->all();
        $inspections=InspectionList::all();
        return view('admin.preopening_lists.add',compact('inspections','zone_id','rides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.preopening_lists.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PreopeningListRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $input['inspection_list'] = implode(',', (array) $request['inspection_list']);
        PreopeningList::create($input);

        alert()->success('Preopening List Added successfully !');
        return redirect()->route('admin.zones.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.preopening_lists.edit')->with('branch',PreopeningList::find($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PreopeningListRequest $request, PreopeningList $preopening_list)
    {
        $preopening_list->update($request->validated());
        $preopening_list->save();

        alert()->success('Preopening List updated successfully !');
        return redirect()->route('admin.preopening_lists.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $preopening_list=PreopeningList::find($id);
        if ($preopening_list){

            $preopening_list->delete();
            alert()->success('Preopening List deleted successfully');
            return back();
        }
        alert()->error('Preopening List not found');
        return redirect()->route('admin.preopening_lists.index');
    }
}
