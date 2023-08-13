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
            'close_date' => $this->close_date,
            'park_id' => $this->park_id,
            'park' => ParkResource::make($this->parks),
            'rides' => RideMainPageResource::collection($this->rides),
            'Family_Riders' => '',
            'Family_queue' => '',
            'Family_cycles' => '',
            'thrill_Riders' => '',
            'thrill_queue' => '',
            'thrill_cycles' => '',
            'kids_Riders' => '',
            'kids_queue' => '',
            'kids_cycles' => '',
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
            ->select([
                'rides.ride_cat',
                'park_times.id as park_time_id',
                DB::raw('AVG(ride_cycles.duration_seconds) as avg_duration'),
                DB::raw(' SUM(COALESCE(ride_cycles.riders_count, 0)) +
                          SUM(COALESCE(ride_cycles.number_of_disabled, 0)) +
                          SUM(COALESCE(ride_cycles.number_of_vip, 0)) +
                          SUM(COALESCE(ride_cycles.number_of_ft, 0)) as total_rider ')
            ])
            ->groupBy('rides.ride_cat', 'park_times.id')
            ->where('park_times.id', $this->id)
            ->where('parks.id', $this->park_id)->get();

        $queues = DB::table('rides')
            ->join('queues', 'rides.id', '=', 'queues.ride_id')
            ->join('park_times', 'queues.park_time_id', '=', 'park_times.id')
            ->join('parks', 'park_times.park_id', '=', 'parks.id')
            ->select([
                'rides.ride_cat',
                'park_times.id as park_time_id',
                DB::raw('AVG(queues.queue_seconds / 60) as avg_queue_minutes')
            ])
            ->groupBy('rides.ride_cat', 'park_times.id')
            ->where('park_times.id', $this->id)
            ->where('parks.id', $this->park_id)
            ->orderBy('park_times.id')
            ->get();
        foreach ($cycle as $cy) {
            foreach ($queues as $queue) {
                if (($cy->park_time_id === $this->id) & ($queue->park_time_id === $this->id)) {
                    if (($cy->ride_cat === 'family') & ($queue->ride_cat === 'family')) {
                        $data['Family_Riders'] = $cy->total_rider;
                        $data['Family_queue'] = $queue->avg_queue_minutes . ' Min';
                        $data['Family_cycles'] = $cy->avg_duration . ' Sec';
                    }
                    if (($cy->ride_cat === 'thrill') & ($queue->ride_cat === 'thrill')) {
                        $data['thrill_Riders'] = $cy->total_rider;
                        $data['thrill_queue'] = $queue->avg_queue_minutes . ' Min';
                        $data['thrill_cycles'] = $cy->avg_duration . ' Sec';
                    }
                    if (($cy->ride_cat === 'kids') & ($queue->ride_cat === 'kids')) {
                        $data['kids_Riders'] = $cy->total_rider;
                        $data['kids_queue'] = $queue->avg_queue_minutes . ' Min';
                        $data['kids_cycles'] = $cy->avg_duration .  ' Sec';
                    }

                }
            }
        }
        return $data;
    }
}
