<?php

namespace App\Imports;

use App\Models\Game;
use App\Models\Ride;
use App\Models\RideStoppages;
use App\Models\StopageSubCategory;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RidesStoppageImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $rows
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $ride = Ride::where('name', $row['ride_name'])->first();
            $sub_category = StopageSubCategory::where('name', $row['ride_stoppage_subcategory'])->first();
//            dd($row);
            RideStoppages::create([
                'ride_id' => $ride->id ?? 1,
                'number_of_seats'=>$row['number_of_seats'],
                'operator_number'=>$row['operator_number'],
                'operator_name'=>$row['operator_name'],
                'ride_status'=>$row['ride_status'],
                'stopage_sub_category_id'=>$sub_category->id ?? 1,
                'ride_notes'=>$row['ride_notes'],
                'date'=> date('Y-m-d', strtotime($row['date'])),
                'time'=> date('H:i:s', strtotime($row['time'])),
                'opened_date'=>date('Y-m-d', strtotime($row['opened_date'])),
                'date_time'=>date('Y-m-d H:i:s', strtotime($row['datetime'])),
                'down_minutes'=>$row['down_minutes']
            ]);
        }

    }
}
