<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Observation;
use App\Models\Park;
use App\Models\PreopeningList;
use App\Models\Ride;
use App\Models\RideStoppages;
use App\Models\User;
use App\Models\Attraction;
use App\Models\GeneralIncident;
use App\Models\UserLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{



    public function rideStatus()
    {

        $rides = DB::table('rides')
            ->groupBy('rides.id')
            ->join('parks', 'parks.id', '=', 'rides.park_id')
            ->leftJoin('park_times', function ($join) {
                $join->on('park_times.park_id', '=', 'parks.id');
            })
            ->leftJoin('ride_stoppages', function ($join) {
                $join->on('ride_stoppages.ride_id', '=', 'rides.id');
            })
            ->select([
                DB::raw('rides.*'),
                DB::raw('parks.name as parkName'),
                DB::raw('park_times.start,park_times.end,park_times.date,park_times.close_date'),
                DB::raw('ride_stoppages.ride_status as stoppageRideStatus,ride_stoppages.ride_notes,ride_stoppages.description as rideSroppageDescription'),

            ])->get();
        foreach ($rides as $ride) {
            $now = Carbon::now();
            $startDateTime = Carbon::parse("$ride->date $ride->start");
            $endDateTime = Carbon::parse("$ride->close_date $ride->end");

            if ($now->between($startDateTime, $endDateTime)) {

                if ($ride->stoppageRideStatus != null) {
                    $ride->available = $ride->stoppageRideStatus;
                } else {
                    $ride->available = 'active';
                    $ride->ride_notes = '';
                    $ride->rideSroppageDescription = '';
                }

            } else {

                $ride->available = 'closed';
                $ride->ride_notes = 'out of park time slot ';
                $ride->rideSroppageDescription = '';
            }
        }
        return view('admin.reports.ride_status', compact('rides'));
    }
    public function stoppagesReport()
    {
        if (auth()->user()->hasRole('Super Admin')) {
            $parks = Park::pluck('name', 'id')->all();
        } else {
            $parks = auth()->user()->parks->pluck('name', 'id')->all();
        }
        return view('admin.reports.stoppage_report', compact('parks'));

    }
    public function showstoppagesReport(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $park_id = $request->input('park_id');
        $items = RideStoppages::whereBetween('opened_date', [$from, $to])
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

        return view('admin.reports.stoppage_report', compact('items', 'parks', 'request'));
    }
    public function inspectionListReport()
    {
        if (auth()->user()->hasRole('Super Admin')) {
            $parks = Park::pluck('name', 'id')->all();
        } else {
            $parks = auth()->user()->parks->pluck('name', 'id')->all();
        }
        return view('admin.reports.inspection_list_report', compact('parks'));

    }

    public function auditReport()
    {
        if (auth()->user()->hasRole('Super Admin')) {
            $parks = Park::pluck('name', 'id')->all();
        } else {
            $parks = auth()->user()->parks->pluck('name', 'id')->all();
        }
        return view('admin.reports.audit_report', compact('parks'));

    }
    public function showAuditReport(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $park_id = $request->input('park_id');
        
        $items = Attraction::where('park_id', $park_id)->whereBetween('date', [$from, $to])->get();
        
        if ($request->input('ride_id')) {
            $rideId = $request->input('ride_id');
            $items = $items->filter(function ($item) use ($rideId) {
                return $item->ride_id == $rideId;
            });
        }
    
        if (auth()->user()->hasRole('Super Admin')) {
            $parks = Park::pluck('name', 'id')->all();
        } else {
            $parks = auth()->user()->parks->pluck('name', 'id')->all();
        }
        
        return view('admin.reports.audit_report', compact('items', 'parks'));
    } 
    

    public function showInspectionListReport(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $park_id = $request->input('park_id');
        $items = PreopeningList::whereBetween('opened_date', [$from, $to])
            ->where('park_id', $park_id)->where('lists_type', 'inspection_list')
            ->get();
        // return $request;
        if ($request->input('ride_id')) {
            $items->where('ride_id', $request->input('ride_id'));
        }
        if (auth()->user()->hasRole('Super Admin')) {
            $parks = Park::pluck('name', 'id')->all();
        } else {
            $parks = auth()->user()->parks->pluck('name', 'id')->all();
        }
        //    dd($items);

        return view('admin.reports.inspection_list_report', compact('items', 'parks', 'request'));
    }
    public function operatorTimeReport()
    {

        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'Operation');
        })->pluck('name', 'id');
        return view('admin.reports.operator_time_report', compact('users'));

    }
    public function showOperatorTimeReport(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $user_id = $request->input('user_id');
        $items = UserLog::selectRaw('ride_id, SUM(shift_hours) as total_hours')
            ->whereBetween('date', [$from, $to])
            ->where('user_id', $user_id)
            ->groupBy('ride_id')
            ->get();
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'Operation');
        })->pluck('name', 'id');
        $currentUser = User::selectRaw('name')->where('id', $user_id)->first();
        return view('admin.reports.operator_time_report', compact('items', 'currentUser', 'users'));
    }

    public function observationReport()
    {
        if (auth()->user()->hasRole('Super Admin')) {
            $rides = Ride::pluck('name', 'id')->all();
        } else {
            $rides = auth()->user()->rides->pluck('name', 'id')->all();
        }
        return view('admin.reports.observation_report', compact('rides'));

    }
    public function showObservationReport(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');

        $items = Observation::whereBetween('date_reported', [$from, $to])
            ->get();
        if ($request->input('ride_id')) {
            $items->where('ride_id', $request->input('ride_id'));
        }
        if (auth()->user()->hasRole('Super Admin')) {
            $rides = Ride::pluck('name', 'id')->all();
        } else {
            $rides = auth()->user()->rides->pluck('name', 'id')->all();
        }
        //    dd($items);

        return view('admin.reports.observation_report', compact('items', 'request','rides'));
    }

    public function incidentReport()
    {
        if (auth()->user()->hasRole('Super Admin')) {
            $parks = Park::pluck('name', 'id')->all();
        } else {
            $parks = auth()->user()->parks->pluck('name', 'id')->all();
        }
        return view('admin.reports.incident_report', compact('parks'));

    }
    public function showIncidentReport(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $park_id = $request->input('park_id');
    
        // Parse the date inputs into DateTime objects
        $fromDate = \Carbon\Carbon::createFromFormat('Y-m-d', $from)->startOfDay();
        $toDate = \Carbon\Carbon::createFromFormat('Y-m-d', $to)->endOfDay();
    
        $items = GeneralIncident::where('park_id', $park_id)
            ->whereBetween('date', [$fromDate, $toDate])->get();
    
        if ($request->input('type')) {
            $items->where('type', $request->input('type'));
        }
        
        if (auth()->user()->hasRole('Super Admin')) {
            $parks = Park::pluck('name', 'id')->all();
        } else {
            $parks = auth()->user()->parks->pluck('name', 'id')->all();
        }
    
        //dd($query);
        return view('admin.reports.incident_report', compact('items', 'parks'));
    }
    
}
