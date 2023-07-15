<?php

namespace App\Http\Resources\User\Ride;

use App\Http\Resources\User\ParkResource;
use App\Http\Resources\User\ZoneResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RideStoppageResource extends JsonResource
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
            'ride_status' => $this->ride_status,
            'stopage_sub_category_id' => $this->stopage_sub_category_id,
            'stopage_sub_category_name' => $this->stopageSubCategory?->name,
            'date' => $this->date,
            'opened_date' => $this->opened_date,
            'type' => $this->type,
            'description' => $this->description,
            'ride_notes' => $this->ride_notes,
            'time_slot_start' => $this->time_slot_start,
            'stopage_category_id' => $this->stopage_category_id,

        ];

         return $data;
    }
}
