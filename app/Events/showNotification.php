<?php

namespace App\Events;

use App\Models\RideStoppages;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class showNotification implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $action;
    public function __construct(public $id, public $title, public $date, public $time_id, public $ride_id)
    {
        $this->action = route('admin.showStoppages', ['ride_id' => $ride_id, 'park_time_id' => $time_id]);
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['User.Notifications.'.$this->id];
    }
    public function broadcastAs()
    {
        return 'show-notification' ;
    }
    

    public function broadcastWith()
    {
        return [
            'data' => [
                'id' => $this->id,
                'title' => $this->title,
                'date' => $this->date,
                'time_id' => $this->time_id,
                'ride_id' => $this->ride_id,
                'action' => $this->action
            ],
        ];
    }


}
