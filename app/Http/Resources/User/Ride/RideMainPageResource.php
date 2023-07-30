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
            'park' => ParkResource::make( $this->park ),
            'status' => $this->rideStoppages?->last()->ride_status ?? 'active',

        ];


        $stoppageNewDate = $this->rideStoppages?->where( 'ride_status', 'stopped' )->first();
        $stoppageLastDate = $this->rideStoppages?->where( 'ride_status', 'stopped' )->last();
        $stoppages = $this->rideStoppages?->where( 'ride_status', 'stopped' );
        if ($stoppageLastDate && $stoppageLastDate?->stoppage_status == 'pending' && $stoppageLastDate?->parent_id == null ) {
            $stoppageStartTime = Carbon::now();
            $date = Carbon::now()->toDateString();
            $stoppageParkTimeEnd = Carbon::parse( "$date $stoppageLastDate->time_slot_start" );
            $down_minutes = $stoppageParkTimeEnd->diffInMinutes( $stoppageStartTime );

        } else {
            $down_minutes = $stoppages?->sum( 'down_minutes' );
        }

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
