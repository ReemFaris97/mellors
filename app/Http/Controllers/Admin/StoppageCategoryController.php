<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Ride\StoppageCategoryRequest;
use App\Models\StopageCategory;
use Illuminate\Http\Request;

class StoppageCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=StopageCategory::all();
        return view('admin.stoppage_category.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stoppage_category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoppageCategoryRequest $request)
    {
        StopageCategory::create($request->validated());
        alert()->success('Stoppage Category Added successfully !');
        return redirect()->route('admin.stoppage-category.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.stoppage_category.edit')->with('item',StopageCategory::find($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoppageCategoryRequest $request,$id)
    {
        $stopageCategory=StopageCategory::find($id);
        $stopageCategory->update($request->validated());
        alert()->success('Stoppage Category updated successfully !');
        return redirect()->route('admin.stoppage-category.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stopageCategory=StopageCategory::find($id);
        if ($stopageCategory){

            $stopageCategory->delete();
            alert()->success('Stoppage Category deleted successfully');
            return back();
        }
        alert()->error('Stoppage Category not found');
        return redirect()->route('admin.branches.index');
    }
}
