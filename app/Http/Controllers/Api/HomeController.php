<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\RideResource;
use App\Http\Resources\User\UserResource;
use App\Models\Ride;
use App\Traits\Api\ApiResponse;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    use ApiResponse;

    public function home()
    {
        $user = Auth::user();
        $this->body['rides'] = RideResource::collection($user->rides);
        return self::apiResponse(200, __('home page'), $this->body);
    }

    public function rideOperation($id)
    {
        $ride = Ride::find($id);

    }

}
