<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RideStatusEvent implements ShouldBroadcastNow

{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public function __construct(private $id,private $status)
    {
    }

    public function broadcastOn()
    {
        return ['ride-status'];

        /*         return  ('timeSlot-notification');
         */
    }

    public function broadcastWith()
    {
        return [
            'message' => [
                'id' => $this->id,
                'status' => $this->status,

            ],
        ];
    }

    public function broadcastAs()
    {

        return 'ride-status';
    }


}
