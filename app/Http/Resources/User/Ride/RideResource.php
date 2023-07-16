<?php

namespace App\Http\Resources\User\Ride;

use App\Http\Resources\User\ParkResource;
use App\Http\Resources\User\ZoneResource;
use App\Models\RideStoppages;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class RideResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'capacity_one_cycle' => $this->times?->first()?->no_of_seats,
            'one_cycle_duration_seconds' => $this->one_cycle_duration_seconds,
            'ride_cycle_mins' => $this->ride_cycle_mins,
            'ride_price' => $this->ride_price,
            'number_of_seats' => $this->number_of_seats,
            'theoretical_number' => $this->theoretical_number,
            'ride_price_ft' => $this->ride_price_ft,
            'minimum_height_requirement' => $this->minimum_height_requirement,
            'ride_cat' => $this->ride_cat,
            'no_of_gondolas' => $this->number_of_seats,
            'ride_type' => RideTypeResource::make($this->ride_type),
            'zone' => ZoneResource::make($this->zone),
            'park' => ParkResource::make($this->park),
            'status' => $this->rideStoppages?->last()->ride_status ?? 'active',

        ];

        $queues = $this->queue->whereBetween('start_time', [dateTime()?->date, dateTime()?->close_date])?->latest()?->first();
        $riders = $this->cycle->where('duration_seconds', 0)?->whereBetween('start_time', [dateTime()?->date, dateTime()?->close_date]);
        $data['queues'] = QueueResource::make($queues);
        $data['queues_count'] = $this->queue->whereBetween('start_time', [dateTime()?->date, dateTime()?->close_date])?->count();
        $data['total_riders'] = $riders?->sum('number_of_vip') + $riders?->sum('number_of_disabled') + $riders?->sum('riders_count') + $riders?->sum('number_of_ft');
        $data['stoppage_minutes'] = $this->rideStoppages?->where('ride_status', 'stopped')->whereBetween('date', [dateTime()?->date, dateTime()?->close_date])?->sum('down_minutes');
        $data['stoppage_count'] = $this->rideStoppages?->whereBetween('date', [dateTime()?->date, dateTime()?->close_date])?->count();

        $stoppageNewDate = $this->rideStoppages?->where('ride_status', 'stopped')->first();

        if ($stoppageNewDate?->date < dateTime()?->date && dateTime() != null) {
            addNewDateStappage($stoppageNewDate, $this);
        }
        return $data;
    }

}
