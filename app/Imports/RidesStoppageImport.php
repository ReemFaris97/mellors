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
            $sub_category = StopageSubCategory::where('name', $row['Ride_Stoppage_SubCategory'])->first();
            RideStoppages::create([
                'ride_id' => $ride ?? 1,
                'number_of_seats'=>$row['number_of_seats'],
                'operator_number'=>$row['operator_number'],
                'operator_name'=>$row['operator_name'],
                'ride_status'=>$row['ride_status'],
                'stopage_sub_category_id'=>$sub_category->name,
                'ride_notes'=>$row['ride_notes'],
                'date'=>$row['date'],
                'time'=>$row['time'],
                'opened_date'=>$row['opened_date'],
                'date_time'=>$row['date_time'],
                'down_minutes'=>$row['down_minutes']
            ]);
        }

    }
}
