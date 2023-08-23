<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attraction;
use App\Models\AttractionInfo;
use App\Models\GeneralQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ParkTime;

use App\Models\Ride;

use Carbon\Carbon;

class GeneralQuestionsController extends Controller
{
    public function show_questions($ride_id, $park_time_id)
    {

        $items = Attraction::where('park_time_id', $park_time_id)->where('ride_id', $ride_id)
            ->get();
        return view('admin.general_questions.index', compact('items', 'ride_id', 'park_time_id'));
    }

    public function add_general_questions($ride_id, $park_time_id)
    {
        $questions = GeneralQuestion::get();
        $ride = Ride::findOrFail($ride_id);
        $zone_id = $ride->zone_id;
       // dd( $questions);
        return view('admin.general_questions.add', compact('questions', 'ride_id', 'zone_id', 'park_time_id'));
    }

    public function store(Request $request)
    {
         //dd($request->all());
        $ride = Ride::findOrFail($request->ride_id);
        $park_time = ParkTime::findOrFail($request->park_time_id);

        $attraction = Attraction::create([
            'ride_id' => $request->ride_id,
            'park_time_id' => $request->park_time_id,
            'date' => Carbon::now()->toDateString(),
            'zone_id' => $ride->zone_id,
            'park_id' => $park_time->park_id,
            'created_by_id' => auth()->id()
        ]);
        foreach ($request->element_ids as $key => $value) {
            AttractionInfo::create([
                'attraction_id' => $attraction->id,
                'general_question_id' => $value,
                'status' => $request->status[$key],
                'note' => $request->comment[$key],
                'corrective_action' => $request->corrective_action[$key],
            ]);
        }
        return response()->json(['success' => 'Question List Added successfully']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Attraction::findOrFail($id);
        $items = AttractionInfo::where('attraction_id',$id)->get();
        return view('admin.general_questions.edit', compact('items','id'));

    }
    public function show_questions_list($id)
    {
        $list = Attraction::findOrFail($id);
        $items = AttractionInfo::where('attraction_id',$id)->get();

        return view('admin.general_questions.Show', compact('items','list','id'));

    }

    public function update(Request $request,$id)
    {
        AttractionInfo::where('attraction_id',$id)->delete();
        foreach ($request->question_id as $key => $value) {
            AttractionInfo::create([
                'attraction_id' => $id,
                'general_question_id' => $value,
                'status' => $request->status[$key],
                'note' => $request->note[$key],
                'corrective_action' => $request->corrective_action[$key],
            ]);
        }
        alert()->success('Update Audit Check List successfully !');
        return redirect()->back();


    }

    protected function approve($id){
        Attraction::find($id)->update(['approve' => 1,
                                     'approved_at'=>Carbon::now()->toDateTimeString(),
                                     'approve_by_id'=>auth()->id()
                                    ]);
        alert()->success('Approve successfully !');
        return redirect()->back();
    }


}
