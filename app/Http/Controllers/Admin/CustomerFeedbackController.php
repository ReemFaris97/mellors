<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CustomerFeedback\CustomerFeedbackRequest;
use App\Models\Ride;
use Illuminate\Http\Request;
use App\Models\CustomerFeedbacks;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;


class CustomerFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.customer_feedbacks.index');
    }

    public function search(Request $request)
    {
        $ride_id = $request->input('ride_id');
        $date = $request->input('date');
        $customer_feedbacks = CustomerFeedbacks::query()
            ->where('ride_id',$ride_id)
            ->Where('date', $date)
            ->get();
        return view('admin.customer_feedbacks.index', compact('customer_feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rides=Ride::pluck('name','id')->all();
        return view('admin.customer_feedbacks.add',compact('rides'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerFeedbackRequest $request)
    {
        CustomerFeedbacks::create($request->validated());
        alert()->success('Customer Feedback  Added successfully !');
        return redirect()->route('admin.customer_feedbacks.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback=CustomerFeedbacks::find($id);
        if ($feedback){

            $feedback->delete();
            alert()->success('Customer Feedback deleted successfully');
            return back();
        }
        alert()->error('Customer Feedback not found');
        return redirect()->route('admin.customer_feedbacks.index');
    }
}
