<?php

namespace App\Imports;

use App\Models\Game;
use App\Models\GameCategory;
use App\Models\Park;
use App\Models\Ride;
use App\Models\Zone;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;

class RidesImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $is_flow = $row['is_flow'] == "yes" ? 1 : 0;
            $park = Park::where('name', $row['park_name'])->first();
            $zone = Zone::where('name', $row['zone'])->first();
            $ride_cat_id = GameCategory::where('name', $row['ride_category'])->first();

            Ride::create([
                'name' => $row['ride_name'],
                'capacity_one_cycle' => $row['capacity_one_cycle'],
                'one_cycle_duration_seconds' => $row['one_cycle_duration_seconds'],
                'ride_cycle_mins' => $row['ride_cycle_mins_include_load_unload'],
                'is_flow' => $is_flow,
                'ride_price' => $row['ride_price'],
                'ride_price_vip' => $row['ride_price_vip'],
                'game_cat_id' => $ride_cat_id->id?? 1,
                'park_id' => $park->id ?? 1,
                'zone_id' => $zone->id ?? 1,
                'date' => $row['date'] ?? now(),
            ]);
        }
    }
}
