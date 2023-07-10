<?php

namespace App\Http\Resources\User\Ride;

use App\Http\Resources\User\ParkResource;
use App\Http\Resources\User\ZoneResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RideQueueResource extends JsonResource
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
            'start_time' => $this->start_time,
            'queue_seconds' => $this->queue_seconds,
        ];


    }
}
