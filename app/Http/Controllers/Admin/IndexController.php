<?php

namespace App\Http\Controllers\Admin;

use App\Models\ParkTime;
use Illuminate\Support\Carbon;
//use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Park;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    { 


        return view('admin.layout.home');
    }
}
