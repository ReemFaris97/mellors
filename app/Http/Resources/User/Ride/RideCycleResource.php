<?php

namespace App\Http\Resources\User\Ride;

use Illuminate\Http\Resources\Json\JsonResource;

class RideCycleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'ride_id' => $this->ride_id,
            'park_time_id' => $this->park_time_id,
            'number_of_vip' => $this->number_of_vip,
            'number_of_disabled' => $this->number_of_disabled??0,
            'riders_count' => $this->riders_count,
            'duration_seconds' => $this->duration_seconds,
        ];


    }
}
