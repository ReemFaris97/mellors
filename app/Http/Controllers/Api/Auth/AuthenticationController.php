<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Traits\AuthTrait;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{

    use AuthTrait;

    public function __construct()
    {
        auth()->shouldUse($this->gurad());
    }

    public function register(RegisterRequest $request)
    {

        \DB::beginTransaction();
        $user = $this->Model()::create($request->validated());
        $user->token = \JWTAuth::fromUser($user);
        \DB::commit();
        $resource = $this->resource();
        return \responder::success(new $resource($user));
    }

    public function login(LoginRequest $request)
    {
        $attemp = auth()->attempt($request->only($this->loginCredentials()));
        if (!$attemp) {
            return \responder::error("wrong credentials");
        }
        $user = auth()->user();
        $user->token = \JWTAuth::fromUser($user);
        $resource = $this->resource();
        return \responder::success(new $resource($user));
    }

    public function logout(Request $request)
    {
        auth()->user()->update(['fcm_token_android' => null, 'fcm_token_ios' => null]);
        auth()->logout();
        return \responder::success(__('logged out successfully !'));
    }
}
