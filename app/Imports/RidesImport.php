<?php

namespace App\Imports;

use App\Models\Game;
use App\Models\Ride;
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
            $game = Game::where('name', $row['ride_name'])->first();
            $is_flow = $row['is_flow'] == "yes" ? 1 : 0;
            Ride::create([
                'game_id' => $game ?? 1,
                'capacity_one_cycle' => $row['capacity_one_cycle'],
                'one_cycle_duration_seconds' => $row['one_cycle_duration_seconds'],
                'ride_cycle_mins' => $row['ride_cycle_mins_include_load_unload'],
                'is_flow' => $is_flow,
                'ride_price' => $row['ride_price'],
                'ride_price_vip' => $row['ride_price_vip'],
                'ride_category' => $row['ride_category'],
                'date' => $row['date'] ?? now(),
            ]);
        }
    }
}
