<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CustomerFeedback\CustomerFeedbackRequest;
use App\Models\Ride;
use Illuminate\Http\Request;
use App\Models\CustomerFeedbacks;
use App\Models\CustomerFeedbackImage;
use App\Models\Park;
use Illuminate\Support\Facades\Auth;

use App\Traits\ImageOperations;
use Illuminate\Support\Facades\Storage;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Aws\S3\ObjectUploader;


class CustomerFeedbackController extends Controller
{
    use ImageOperations;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('Super Admin')) {
            $parks = Park::pluck('name', 'id');
            $customer_feedbacks = CustomerFeedbacks::Where('date', date('Y-m-d'))->get();
        } else {
            $parks = auth()->user()->parks->pluck('id');
            $customer_feedbacks = CustomerFeedbacks::Where('date', date('Y-m-d'))
                ->whereIn('zone_id', auth()->user()->zones->pluck('id'))
                ->get();
        }
        return view('admin.customer_feedbacks.index', compact('customer_feedbacks', 'parks'));
    }

    public function search(Request $request)
    {

        $from = $request->input('from');
        $to = $request->input('to');
        $park_id = $request->input('park_id');
        $customer_feedbacks = CustomerFeedbacks::whereBetween('date', [$from, $to])
            ->where('park_id', $park_id)
            ->get();
        if ($request->input('zone_id')) {
            $customer_feedbacks->where('zone_id', $request->input('zone_id'));
        }
        if (auth()->user()->hasRole('Super Admin')) {
            $parks = Park::pluck('name', 'id')->all();
        } else {
            $parks = auth()->user()->parks->pluck('name', 'id')->all();
        }

        return view('admin.customer_feedbacks.index', compact('customer_feedbacks', 'parks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zones = auth()->user()->zones->pluck('id');
        $rides = Ride::wherein('zone_id', $zones)->pluck('name', 'id')->all();

        return view('admin.customer_feedbacks.add', compact('rides'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerFeedbackRequest $request)
    {
        $ride = Ride::findOrFail($request->input('ride_id'));
        $is_skill_game = $ride->ride_type->name;
        $park_id = $ride->park_id;
        $zone_id = $ride->zone_id;
        $cf = new CustomerFeedbacks();
        $cf->comment = $request->input('comment');
        if ($is_skill_game == 'Skill Game') {
            $cf->is_skill_game = 'skill_game';
        }
        $cf->type = $request->input('type');
        $cf->date = $request->input('date');
        $cf->ride_id = $request->input('ride_id');
        $cf->park_id = $park_id;
        $cf->zone_id = $zone_id;
        $cf->save();
        $customer_feedback_id = $cf->id;
        if ($request->has('image')) {
            $this->Images($request, new CustomerFeedbackImage(), ['customer_feedback_id' => $customer_feedback_id]);
        }

        $zones = auth()->user()->zones->pluck('id');
        $rides = Ride::wherein('zone_id', $zones)->pluck('name', 'id')->all();
        alert()->success('Customer Feedback  Added successfully !');
        return redirect()->route('admin.customer_feedbacks.index', 'rides');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    public function show($id)
    {
        // $files = Storage::files('images');
        // return $files;
        $items = CustomerFeedbacks::findorfail($id);
        $images = CustomerFeedbackImage::where('customer_feedback_id', $id)->get();

        return view('admin.customer_feedbacks.show', compact('items', 'images'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PreopeningListRequest $request, PreopeningList $preopening_list)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = CustomerFeedbacks::find($id);
        if ($feedback) {

            $feedback->delete();
            alert()->success('Customer Feedback deleted successfully');
            return back();
        }
        alert()->error('Customer Feedback not found');
        return redirect()->route('admin.customer_feedbacks.index');
    }
}

