<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TechReport;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TechReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TechReport::where('date', Carbon::now()->format('Y-m-d'))->get();
        return view('admin.tech_reports.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.tech_reports.add');
    }

    public function add_tech_report($park_id, $park_time_id)
    {
        return view('admin.tech_reports.add', compact('park_id', 'park_time_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        foreach ($request->question as $key => $value) {
            $list = new TechReport();
            $list->question = $request->question[$key];
            $list->answer = $request->answer[$key];
            $list->comment = $request->comment[$key];
            $list->park_id = $request->park_id;
            $list->park_time_id = $request->park_time_id;
            $list->date = Carbon::now()->format('Y-m-d');
            $list->user_id = auth()->user()->id;
            $list->save();
        }
        return response()->json(['success' => 'Tech Report Added successfully']);

//        alert()->success('Preopening List Added successfully !');
//        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('admin.tech_reports.edit');

    }

    public function show($id)
    {

        return view('admin.preopening_lists.index');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SkillGameReport $list)
    {

        return redirect()->route('admin.preopening_lists.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $preopening_list = SkillGameReport::find($id);
        if ($preopening_list) {

            $preopening_list->delete();
            alert()->success('Preopening List deleted successfully');
            return back();
        }
        alert()->error('Preopening List not found');
        return redirect()->route('admin.preopening_lists.index');
    }
}
