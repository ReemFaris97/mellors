<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Resources\User\RideResource;
use App\Http\Resources\User\UserResource;
use App\Traits\Api\ApiResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponse;

    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        $cred = ['phone' => $validated['phone'], 'password' => $validated['password']];
        if (Auth::attempt($cred)) {
            $user = Auth::user();
            $this->message = __('login successfully');
            $this->body['rides'] = RideResource::collection($user->rides);
            $this->body['accessToken'] = $user->createToken('user-token')->plainTextToken;
            return self::apiResponse(200, $this->message, $this->body);
        } else {
            $this->message = __('auth failed');
            return self::apiResponse(400, $this->message);
        }

    }

}
