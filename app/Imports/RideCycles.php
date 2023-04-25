<?php

namespace App\Imports;

use App\Models\Park;
use App\Models\Ride;
use App\Models\RideStoppages;
use App\Models\StopageSubCategory;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RideCycles implements ToCollection,WithHeadingRow
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
        if (is_null($ride)) {
            return throw ValidationException::withMessages(['ride' => 'Ride does not exist']);
        }
        if (is_null($operator)) {
            return throw ValidationException::withMessages(['Operator' => 'Operator does not exist']);
        }
        if (is_null($park)) {
            return throw ValidationException::withMessages(['Park' => 'Park does not exist']);
        }
            \App\Models\RideCycles::create([
                'ride_id' => $ride->id ?? 1,
                'user_id' => $operator->id?? null,
                'park_id'=>$park->id??null,
                'opened_date' => date('Y-m-d', strtotime($row['opened_date'])),
                'start_time' => date('Y-m-d H:i:s', strtotime($row['start_time'])),
                "riders_count" => $row['riders_count'],
                "number_of_ft" => $row['riders_count_ft'] ?? 0,
                "number_of_vip" => $row['riders_count_vip'] ?? 0,
                "number_of_disabled" => $row['riders_count_disabled'] ?? 0,
                "duration_seconds" => $row['duration_seconds'],
                "sales" => $row['sales']
            ]);
        }

    }
}
