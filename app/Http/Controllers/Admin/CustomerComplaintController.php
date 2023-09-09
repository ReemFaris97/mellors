<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Questions\QuestionRequest;
use App\Models\CustomerComplaint;

class CustomerComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=CustomerComplaint::all();
       return view('admin.complaints.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.complaints.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        CustomerComplaint::create($request->validated());
        alert()->success('Customer Complaint Added successfully !');
        return redirect()->route('admin.complaints.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.complaints.edit')->with('complaint',CustomerComplaint::find($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, $id)
    {
        $customerComplaint = CustomerComplaint::findOrFail($id);
        $customerComplaint->update($request->validated());
        $customerComplaint->save();

        alert()->success('Customer Complaint updated successfully !');
        return redirect()->route('admin.complaints.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question=CustomerComplaint::find($id);
        if ($question){

            $question->delete();
            alert()->success('Customer Complaint deleted successfully');
            return back();
        }
        alert()->error('Customer Complaint not found');
        return redirect()->route('admin.complaints.index');
    }
}
