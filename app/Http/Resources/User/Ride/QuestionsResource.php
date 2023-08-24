<?php

namespace App\Http\Resources\User\Ride;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return  QuestionsNameResource::collection($this);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
        ];

    }
}
