<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Ride\StoppageCategoryRequest;
use App\Http\Requests\Dashboard\Ride\StoppageSubCategoryRequest;
use App\Models\StopageCategory;
use App\Models\StopageSubCategory;
use Illuminate\Http\Request;

class StoppageSubCategoryController extends Controller
{
    public function index()
    {
        $items=StopageSubCategory::all();
        return view('admin.stoppage_sub_category.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $main_categories=StopageCategory::pluck('name','id')->toArray();

        return view('admin.stoppage_sub_category.add',compact('main_categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoppageSubCategoryRequest $request)
    {
        StopageSubCategory::create($request->validated());
        alert()->success('Stoppage sub Category Added successfully !');
        return redirect()->route('admin.stoppage-sub-category.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $main_categories=StopageCategory::pluck('name','id')->toArray();
        $item=StopageSubCategory::findOrFail($id);
        return view('admin.stoppage_sub_category.edit',compact('item','main_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoppageSubCategoryRequest  $request, $id)
    {
        $item=StopageSubCategory::findOrFail($id);
        $item->update($request->validated());
        alert()->success('Stoppage Sub Category updated successfully !');
        return redirect()->route('admin.stoppage-sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
