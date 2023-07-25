<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Resources\User\NotificationResource;
use App\Http\Resources\User\UserResource;
use App\Models\UserLog;
use App\Traits\Api\ApiResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponse;

    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        if (filter_var($validated['username'], FILTER_VALIDATE_EMAIL)) {
            $cred = ['email' => $validated['username'], 'password' => $validated['password']];
        } else {
            $cred = ['name' => $validated['username'], 'password' => $validated['password']];
        }
        if (Auth::attempt($cred)) {

            $user = Auth::user()->hasAnyRole(['Ride & Ops', 'Operation', 'Maintenance', 'Health & Safety', 'zone supervisor']);
            if (!$user) {
                return self::apiResponse(400, __('you dont have permission'));
            }
            $user = Auth::user();
            $data = ['user_id' => $user->id,
                'type' => 'login', 'date' => Carbon::now()->toDateString(), 'time' => Carbon::now()->toTimeString()];
            $role = $user->roles->first()?->name == 'Operation';
            if ($role) {
                $data['ride_id'] = $user->rides[0]->id;
            }
            UserLog::query()->create($data);

            $this->message = __('login successfully');
            $this->body['user'] = UserResource::make($user);
            $this->body['accessToken'] = $user->createToken('user-token')->plainTextToken;
            return self::apiResponse(200, $this->message, $this->body);
        } else {
            $this->message = __('auth failed');
            return self::apiResponse(400, $this->message);
        }

    }

    public function logout()
    {
        $user = auth()->user('sanctum');
        $data = ['user_id' => $user->id,
            'type' => 'logout', 'date' => Carbon::now()->toDateString(), 'time' => Carbon::now()->toTimeString()];
        $role = $user->roles->first()?->name == 'Operation';
        $log = UserLog::where('user_id', $user->id)->where('type', 'login')->latest()->first();
        if ($role && $log) {
            $startTime = Carbon::parse($log->time);
            $finishTime = Carbon::now()->toTimeString();
            $data['ride_id'] = $user->rides[0]->id;
            $data['shift_hours'] = $startTime->diffInHours($finishTime);
        }
        UserLog::query()->create($data);
        auth()->user('sanctum')->tokens()->delete();
        $this->message = __('Logged out successfully');
        return self::apiResponse(200, $this->message, []);

    }

    protected function notifications()
    {
        $this->body['notifications'] = NotificationResource::collection(auth()->user()->notifications()?->paginate(10));
        return self::apiResponse(200, 'notifications', $this->body);

    }

}
