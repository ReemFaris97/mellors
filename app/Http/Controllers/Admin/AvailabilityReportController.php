<?php

namespace App\Http\Controllers\Admin;

use App\Events\ReportEvent;
use App\Models\User;
use App\Notifications\ReportNotifications;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GameTime;
use App\Models\Park;
use App\Models\ParkTime;
use App\Models\Ride;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;

class AvailabilityReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('Super Admin')) {
            $parks = Park::pluck('name', 'id')->all();
        } else {
            $parks = auth()->user()->parks->pluck('name', 'id')->all();
        }
        return view('admin.availability_reports.index', compact('parks'));
    }

    public function addAvailabilityReport($id)
    {
        $rides = Ride::where('park_id', $id)->get();
        //dd($rides);
        return view('admin.availability_reports.add', compact('rides'));

    }

    public function create()
    {

    }


    public function store(Request $request)
    {
        $users = User::whereHas('roles', function ($query) {
            return $query->where('name', 'Super Admin');
        })->get();

        foreach ($request->ride_id as $key => $value) {
            $list = new GameTime();
            $list->ride_id = $request->ride_id[$key];
            $list->first_status = $request->first_status[$key];
            $list->no_of_gondolas = $request->no_of_gondolas[$key];
            $list->no_of_seats = $request->no_of_seats[$key];
            $list->park_id = $request->park_id[$key];
            $list->comment = $request->comment[$key];
            $list->date = Carbon::now()->format('Y-m-d');
            $list->user_id = auth()->user()->id;
            $list->save();


        }
        $data = [
            'title' => 'Availability Report Added successfully !',
            'user_id' => Auth::user()->id,
    
        ];
        if ($users) {
            foreach ($users as $user) {
                Notification::send($user, new ReportNotifications($data));
                event(new ReportEvent($user->id, $data['title'], Carbon::now()));
            }
        }
        alert()->success('Availability Report Added successfully !');
        return redirect()->route('admin.parks.index');

    }

    public function edit($id)
    {
        $items = GameTime::where('park_id', $id)->where('date', Carbon::now()->format('Y-m-d'))->get();
        // return($items);
        return view('admin.availability_reports.edit', compact('items', 'id'));
    }


    public function show($id)
    {

    }

    public function update(Request $request)
    {
        //dd($request->all());

        $list = GameTime::where('park_id', $request->park_id)->where('date', Carbon::now()->format('Y-m-d'))->get();
        $users = User::whereHas('roles', function ($query) {
            return $query->where('name', 'Super Admin');
        })->get();

        foreach ($request->ride_id as $key => $value) {
            $gameTime = $list[$key];
            $gameTime->first_status = $request->first_status[$key];
            $gameTime->second_status = $request->second_status[$key];
            $gameTime->no_of_gondolas = $request->no_of_gondolas[$key];
            $gameTime->no_of_seats = $request->no_of_seats[$key];
            $gameTime->comment = $request->comment[$key];
            $gameTime->update();
        }
        $users = User::whereHas('roles', function ($query) {
            return $query->where('name', 'Super Admin');
        })->get();
        $data = [
            'title' => 'Availability Report Added successfully !',
            'user_id' => Auth::user()->id
        ];
        if ($users) {
            foreach ($users as $user) {
                Notification::send($user, new ReportNotifications($data));
                event(new ReportEvent($user->id, $data['title'], Carbon::now()));
            }
        }

        alert()->success('Second Status Added successfully To Report !');
        return redirect()->route('admin.parks.index');

    }

    public function showAvailabilityReport(Request $request)
    {
        // return $request;
        $from = $request->input('from');
        $to = $request->input('to');
        $park_id = $request->input('park_id');
        $items = GameTime::whereBetween('date', [$from, $to])
            ->where('park_id', $park_id)
            ->get();
        //     return $items;
        if ($request->input('ride_id')) {
            $items->where('ride_id', $request->input('ride_id'));
        }
        if (auth()->user()->hasRole('Super Admin')) {
            $parks = Park::pluck('name', 'id')->all();
        } else {
            $parks = auth()->user()->parks->pluck('name', 'id')->all();
        }

        return view('admin.availability_reports.index', compact('items', 'parks', 'request'));
    }

    public function destroy($id)
    {


        $items = GameTime::where('park_id', $id)->where('date', Carbon::now()->format('Y-m-d'))->get();
        if ($items) {
            foreach ($items as $item) {
                $item->delete();
            }
            alert()->success('This Availability Report Deleted Successfully');
            return back();
        }
        alert()->error('This Availability Report not found');
        return redirect()->route('admin.park.index');
    }


}
