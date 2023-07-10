<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class timeSlotNotification implements ShouldBroadcastNow

{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_name;
    public $start;
    public $end;
    public $date;
    public $close_date;

    public function __construct($data = [])
    {

        $this->user_name = $data['user_name'];
        $this->start = $data['start'];
        $this->end = $data['end'];
        $this->date = $data['date'];
        $this->close_date = $data['close_date'];
    }

    public function broadcastOn()
    {
        return new \Illuminate\Broadcasting\Channel('timeSlot-notification');
    }

    public function broadcastWith()
    {
        return [
            'message' => [
                'start' => $this->start,
                'end' => $this->end,
                'date' => $this->date,
                'user_name' => $this->user_name,
                'close_date' => $this->close_date,
//              'created_at' => $this->message->created_at,
            ],
        ];
    }


}
