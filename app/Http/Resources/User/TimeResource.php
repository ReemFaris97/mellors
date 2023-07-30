<?php

namespace App\Http\Resources\User;

use Illuminate\Support\Facades\DB;
use App\Http\Resources\User\Ride\RideResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User\Ride\RideMainPageResource;

class TimeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->id,
            'duration_time' => $this->duration_time,
            'date' => $this->date,
            'start' => $this->start,
            'end' => $this->end,
            'park_id' => $this->park_id,
            'park' => ParkResource::make($this->parks),
            'rides' => RideMainPageResource::collection($this->rides)
        ];

        $cycles = $this->cycles
            ? $this->cycles
                ->whereBetween('start_time', [dateTime()?->date, dateTime()?->close_date])
            : null;

        $data['total_riders'] = $cycles?->sum('number_of_vip') + $cycles?->sum('number_of_disabled') + $cycles?->sum('riders_count') + $cycles?->sum('number_of_ft');

        $cycle = DB::table('rides')
            ->join('ride_cycles', 'rides.id', '=', 'ride_cycles.ride_id')
            ->join('park_times', 'ride_cycles.park_time_id', '=', 'park_times.id')
            ->join('parks', 'park_times.park_id', '=', 'parks.id')
            ->select(['rides.ride_cat', 'park_times.id as park_time_id',
                DB::raw('AVG(ride_cycles.duration_seconds) as avg_duration'),
                DB::raw(' SUM(COALESCE(ride_cycles.riders_count, 0)) +
                          SUM(COALESCE(ride_cycles.number_of_disabled, 0)) +
                          SUM(COALESCE(ride_cycles.number_of_vip, 0)) +
                          SUM(COALESCE(ride_cycles.number_of_ft, 0)) as total_rider ')])
            ->groupBy('rides.ride_cat', 'park_times.id')
            ->where('park_times.id', $this->id)
            ->where('parks.id', $this->park_id)->get();
        return $data;
    }
}
