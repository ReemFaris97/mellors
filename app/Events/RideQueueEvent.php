<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RideQueueEvent implements ShouldBroadcastNow

{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public function __construct(public $id, public $status)
    {
    }

    public function broadcastOn()
    {
        return new \Illuminate\Broadcasting\Channel('ride-queue');

    }

    public function broadcastWith()
    {
        return [
            'data' => [
                'id' => $this->id,
                'status' => $this->status,
            ],
        ];
    }


}
