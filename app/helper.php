<?php

use App\Models\ParkTime;
use Illuminate\Support\Carbon;

if (!function_exists('dateTime')) {
    function dateTime()
    {
        $currentDate = Carbon::now()->toDateString();
        $currentTime = Carbon::now()->format('H:i');
        $parks = auth()->user()->parks->pluck('id');
        $time = ParkTime::where('date', $currentDate)
            ->orWhere(function ($subquery) use ($currentDate, $currentTime) {
                $subquery->where('close_date', $currentDate)
                    ->where('end', '>=', $currentTime);
            })->whereIn('park_id', $parks)
            ->first();
        return $time;
    }
}

