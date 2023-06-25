<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\InspectionList\InspectionListRequest;
use App\Models\InspectionList;

class InspectionListController extends Controller
{
   
    public function index()
    {
        $items=InspectionList::all();
       return view('admin.inspection_lists.index',compact('items'));
    }

  
    public function create()
    {
        return view('admin.inspection_lists.add');
    }

  
    public function store(InspectionListRequest $request)
    {
        InspectionList::create($request->validated());
        alert()->success('Inspection element Added successfully !');
        return redirect()->route('admin.inspection_lists.index');
    }

  
    public function edit($id)
    {
        return view('admin.inspection_lists.edit')->with('inspection_list',InspectionList::find($id));

    }

   
    public function update(InspectionListRequest $request, InspectionList $inspection_list)
    {
        $inspection_list->update($request->validated());
        $inspection_list->save();

        alert()->success('Inspection element updated successfully !');
        return redirect()->route('admin.inspection_lists.index');
    }
   
    public function destroy($id)
    {
        $inspection_list=InspectionList::find($id);
        if ($inspection_list){

            $inspection_list->delete();
            alert()->success('Inspection element deleted successfully');
            return back();
        }
        alert()->error('department not found');
        return redirect()->route('admin.inspection_lists.index');
    }
}
