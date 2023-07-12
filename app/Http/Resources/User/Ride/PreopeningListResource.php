<?php

namespace App\Http\Resources\User\Ride;

use Illuminate\Http\Resources\Json\JsonResource;

class PreopeningListResource extends JsonResource
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
            'name' => $this->name,
            'inspection_list' => InspectionResource::make($this->inspection_list),
            'status' =>$this->status,
            'is_checked' =>$this->is_checked,
            'comment' =>$this->comment,
            'zone_id' =>$this->zone_id,
            'park_id' =>$this->park_id,
            'opened_date' =>$this->opened_date,
            'lists_type' =>$this->lists_type,

        ];
    }
}
