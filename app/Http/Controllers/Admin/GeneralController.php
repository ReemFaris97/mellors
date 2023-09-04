<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ride;
use App\Models\StopageSubCategory;
use App\Models\Zone;
use Illuminate\Http\Request;

class GeneralController extends Controller
{


    public function getParkZones(Request $request)
    {
        if (auth()->user()->hasRole('Super Admin')) {
            $zones = Zone::where("park_id", $request->park_id)->get();
        } else {
            $zones = Zone::where("park_id", $request->park_id)
            ->whereIn('id', auth()->user()->zones->pluck('id'))
            ->get();
        }
        $html = '<option value="">' .'Choose Zone' . '</option>';

        foreach ($zones as $zone) {
            $html .= '<option value="' . $zone->id . '">' . $zone->name . '</option>';
        }
        return response()->json(['html' => $html]);
    }

    public function getSubStoppageCategories(Request $request)
    {
        $cities = StopageSubCategory::where("stopage_category_id", $request->stopage_category_id)->get();

        return response()->json(['subCategory' => $cities]);
    }

    public function getParkRides(Request $request)
    {
        $html = '';
        $rides = Ride::where('park_id', $request->park_id)->get();
        $html = '<option value="">' .'Choose Ride' . '</option>';

        foreach ($rides as $ride) {
            $html .= '<option value="' . $ride->id . '">' . $ride->name . '</option>';
        }
        return response()->json(['html' => $html]);
    }

}
