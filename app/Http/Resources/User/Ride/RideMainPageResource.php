<?php

namespace App\Http\Resources\User\Ride;

use App\Http\Resources\User\ParkResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class RideMainPageResource extends JsonResource {
    /**
    * Transform the resource into an array.
    *
    * @param \Illuminate\Http\Request $request
    * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
    */

    public function toArray( $request ) {
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->rideStoppages?->last()->ride_status ?? 'active',

        ];

        $stoppageNewDate = $this->rideStoppages?->where( 'ride_status', 'stopped' )->first();
        $stoppageLastDate = $this->rideStoppages?->where( 'ride_status', 'stopped' )->last();

        $queues = $this->queue
        ? $this->queue
        ->whereBetween( 'start_time', [ dateTime()?->date, dateTime()?->close_date ] )
        ->latest()
        ->first()
        : null;

        $data[ 'queues' ] = QueueResource::make( $queues );

        if ( $stoppageLastDate && $stoppageLastDate?->date < dateTime()?->date && dateTime() != null ) {
            addNewDateStappage( $stoppageNewDate, $this );
        }
        return $data;
    }

}
