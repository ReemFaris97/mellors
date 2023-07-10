<?php

namespace App\Http\Resources\User\Ride;

use App\Http\Resources\User\ParkResource;
use App\Http\Resources\User\ZoneResource;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'time' => RideTimeResource::make($this->times?->last()),
            'status' => $this->rideStoppages?->last()->ride_status ?? 'active'
        ];

        return $data;
    }
}