<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class TimeSlotResource extends JsonResource
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
            'start' => $this->start,
            'end' => $this->end,
            'park_id' => $this->park_id,
            'park_name' => $this->parks?->name,
            'date' => $this->date,
            'close_date' => $this->close_date,
        ];
    }
}
