<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CustomerFeedback\CustomerFeedbackRequest;
use App\Models\Ride;
use Illuminate\Http\Request;
use App\Models\CustomerFeedbacks;
use App\Models\CustomerFeedbackImage;
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
        $customer_feedbacks =CustomerFeedbacks::Where('date', date('Y-m-d'))->get();
        return view('admin.customer_feedbacks.index',compact('customer_feedbacks'));
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
        $ride=Ride::findOrFail($request->input('ride_id'));
        $is_skill_game=$ride->ride_type->name;
        $cf = new CustomerFeedbacks();
        $cf->comment = $request->input('comment');
        if($is_skill_game == 'Skill Game'){
        $cf-> is_skill_game ='skill_game';
        }
        $cf-> type = $request->input('type');
        $cf-> date = $request->input('date');
        $cf->ride_id = $request->input('ride_id');
        $cf->save();
        $customer_feedback_id=$cf->id;
           if ($request->has('image')) {
                    $this->Images($request, new CustomerFeedbackImage(), ['customer_feedback_id' =>$customer_feedback_id]);
                }
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
    public function show($id)
    {
        $files = Storage::files('images');
         $files;
     //return $files;
        $items=CustomerFeedbacks::findorfail($id);
        $images=CustomerFeedbackImage::where('customer_feedback_id',$id)->get();   
        $s3 = Storage::disk('s3');

                $files = $s3->files('images');

                $presignedUrls = [];

                foreach ($files as $file) {
                    $command = $s3->getDriver()->getAdapter()->getClient()->getCommand('GetObject', [
                        'Bucket' => 'your-bucket',
                        'Key' => $file
                    ]);

                    $request = $s3->getDriver()->getAdapter()->getClient()->createPresignedRequest($command, '+20 minutes');

                    $presignedUrls[] = (string) $request->getUri();
                }     

        return view('admin.customer_feedbacks.show',compact('items','images','files'));

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

