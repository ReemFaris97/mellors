<?php

namespace App\Http\Resources\User\Ride;

use App\Http\Resources\User\ParkResource;
use App\Http\Resources\User\ZoneResource;
use Illuminate\Http\Resources\Json\JsonResource;

class QueueResource extends JsonResource
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
        ];

        return $data;
    }
}
