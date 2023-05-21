<?php

namespace App\Imports;

use App\Models\Game;
use App\Models\Park;
use App\Models\ParkTime;
use App\Models\Ride;
use App\Models\RideStoppages;
use App\Models\StopageSubCategory;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
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
            $sub_category = StopageSubCategory::where('name', $row['stoppage_subcategory'])->first();
            $operator = User::where('name', $row['operator_name'])->first();
            $park = Park::where('name', $row['park_name'])->first();

//            if (is_null($ride)) {
//                return throw ValidationException::withMessages(['ride' => 'Ride does not exist']);
//            }
//            if (is_null($operator)) {
//                return throw ValidationException::withMessages(['Operator' => 'Operator does not exist']);
//            }
//            if (is_null($sub_category)) {
//                return throw ValidationException::withMessages(['StoppageSubCategory' => 'StoppageSubCategory does not exist']);
//            }
            $park_time=ParkTime::where('park_id',$park->id)
            ->where('date', date('Y-m-d', strtotime($row['opened_date'])))->first();
            RideStoppages::create([
                'ride_id' => $ride->id ?? 3,
                'user_id' => $operator->id ?? null,
//                'stoppage_status' => $row['stoppage_status'],
                'stopage_sub_category_id' => $sub_category->id ?? 1,
                'description' => $row['stoppage_description'],
                'down_minutes' => $row['down_minutes'],
                'park_time_id'=>$park_time->id??null,
                'opened_date' => date('Y-m-d', strtotime($row['opened_date'])),                'date' => date('Y-m-d', strtotime($row['start_time'])),
                'time' => date('H:i:s', strtotime($row['start_time'])),
                'date_time' => date('Y-m-d H:i:s', strtotime($row['start_time'])),
            ]);
        }

    }
}
