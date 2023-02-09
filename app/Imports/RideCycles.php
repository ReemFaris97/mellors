<?php

namespace App\Imports;

use App\Models\Park;
use App\Models\Ride;
use App\Models\RideStoppages;
use App\Models\StopageSubCategory;
use App\Models\User;
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
            \App\Models\RideCycles::create([
                'ride_id' => $ride->id ?? 1,
                'user_id' => $operator->id?? null,
                'park_id'=>$park->id??null,
                'date' => date('Y-m-d', strtotime($row['date'])),
                'time' => date('H:i:s', strtotime($row['time'])),
                'opened_date' => date('Y-m-d', strtotime($row['opened_date'])),
//                'date_time' => date('Y-m-d H:i:s', strtotime($row['datetime'])),
                "seats_filled" => $row['seats_filled'],
                "number_of_vip" => $row['num_of_vip'],
                "number_of_disabled" => $row['num_of_disabled'],
//                "date_time" => $row['datetime'],
                "cycle_time_minute" => $row['cycle_time_minute'],
                "ride_price" => $row['cycle_time_minute'],
                "ride_price_vip" => $row['ride_price_vip'],
                "ride_price_new" =>$row['ride_price_new'],
                "ride_price_vip_new" => $row['ride_price_vip_new'],
                "sales" => $row['sales']
            ]);
        }

    }
}
