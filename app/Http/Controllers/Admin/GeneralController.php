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
        $cities = Zone::where("park_id", $request->park_id)->get();

        return response()->json(['zones' => $cities]);
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
