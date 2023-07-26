<?php

namespace App\Http\Resources\User;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'title' => (string)data_get($this->data, 'title'),
            'ride_id' => (string)data_get($this->data, 'ride_id'),
            'date' => date('Y-m-d H:i:s', strtotime($this->created_at))

        ];
    }
}
