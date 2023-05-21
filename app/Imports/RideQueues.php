<?php

namespace App\Imports;

use App\Models\Park;
use App\Models\ParkTime;
use App\Models\Ride;
use App\Models\Queue;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RideQueues implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $ride = Ride::where('name', $row['ride_name'])->first();
            $operator = User::where('name', $row['operator_name'])->first();
            $park = Park::where('name', $row['park_name'])->first();
            if (is_null($ride)) {
                return throw ValidationException::withMessages(['ride' => 'Ride does not exist']);
            }
            if (is_null($operator)) {
                return throw ValidationException::withMessages(['Operator' => 'Operator does not exist']);
            }
            if (is_null($park)) {
                return throw ValidationException::withMessages(['Park' => 'Park does not exist']);
            }
            $park_time=ParkTime::where('park_id',$park->id)
            ->where('date', date('Y-m-d', strtotime($row['opened_date'])))->first();
            Queue::create([
                'ride_id' => $ride->id ?? 3,
                'user_id' => $operator->id ?? null,
                'park_time_id'=>$park_time->id??null,
                'opened_date' => date('Y-m-d', strtotime($row['opened_date'])),                'park_id' => $park->id ?? null,
                'start_time' => date('Y-m-d H:i:s', strtotime($row['start_time'])),
                "queue_minutes" => $row['queue_minutes'],
                "rider_count" => $row['rider_count'],
                "current_wait_time" => $row['current_wait_time'] ?? 0,
                "max_queue_capacity" => $row['max_queue_capacity'] ?? 0,
                "current_queue_occupancy" => $row['current_queue_occupancy'] ?? 0

            ]);
        }

    }
}
