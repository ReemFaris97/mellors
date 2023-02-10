<?php

namespace App\Imports;

use App\Models\Park;
use App\Models\Ride;
use App\Models\Queue;
use App\Models\StopageSubCategory;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RideQueues implements ToCollection,WithHeadingRow
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
//            dd($row);
            \App\Models\Queue::create([
                'ride_id' => $ride->id ?? 1,
                'user_id' => $operator->id?? null,
                'park_id'=>$park->id??null,
                'date' => date('Y-m-d', strtotime($row['date'])),
                'time' => date('H:i:s', strtotime($row['time'])),
                'opened_date' => date('Y-m-d', strtotime($row['opened_date'])),
//               'date_time' => date('Y-m-d H:i:s', strtotime($row['datetime'])),
                "seats_filled" => $row['number_of_seats'],
                "queue_minutes" => $row['queue_minutes'],
                "queue_seconds" =>$row['queue_seconds'],

            ]);
        }

    }
}
