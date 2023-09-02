<?php

use App\Models\Notification;
use App\Models\ParkTime;
use App\Models\RideStoppages;

use Illuminate\Support\Carbon;

if (!function_exists('dateTime')) {
    function dateTime()
    {
        $currentDate = Carbon::now()->toDateString();
        $currentTime = Carbon::now()->format('H:i');
        $parks = auth()->user()->parks->pluck('id');
        $time = ParkTime::whereIn('park_id', $parks)
            ->where(function ($query) use ($currentDate, $currentTime) {
                $query->where('date', $currentDate)
                    ->orWhere('close_date', $currentDate)->where('end', '>=', $currentTime);
            })
        
            ->first();
        return $time;
    }
}

if (!function_exists('addNewDateStappage')) {
    function addNewDateStappage($stoppage, $ride)
    {
        $open = \Carbon\Carbon::now()->toDateString();
        $park_time = dateTime();
        $time_slot_start = \Carbon\Carbon::now()->toTimeString();
        $stoppageStartTime = Carbon::parse("$open $time_slot_start");
        $stoppageParkTimeEnd = Carbon::parse("$park_time->close_date $park_time->end");
        $validate['down_minutes'] = $stoppageParkTimeEnd->diffInMinutes($stoppageStartTime);
        $validate['opened_date'] = $park_time->date;
        $validate['time'] = $time_slot_start;
        $validate['time_slot_start'] = $park_time->start;
        $validate['date'] = $open;
        $validate['ride_id'] = $ride->id;
        $validate['parent_id'] = $stoppage->id;
        $validate['stopage_sub_category_id'] = $stoppage->stopage_sub_category_id;
        $validate['stopage_category_id'] = $stoppage->stopage_category_id;
        $validate['park_time_id'] = $park_time->id;
        $validate['user_id'] = auth()->user()->id;

        RideStoppages::query()->create($validate);
    }
}


if (!function_exists('notifications')) {
    function notifications()
    {
        return Notification::where('notifiable_id', auth()->user()->id)->whereNull('read_at')->latest()?->get();
    }
}
