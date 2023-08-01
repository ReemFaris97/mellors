<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReportEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $action;
    public function __construct(public $id,public $title,public  $date)
    {
        $this->action = route('admin.reports.showAvailabilityReport', ['park_id' => dateTime()?->park_id, 'from' => dateTime()?->date, 'to' => dateTime()?->date]);

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('User.Notifications.'.$this->id);
    }
    public function broadcastWith()
    {
        return [
            'data' => [
                'id' => $this->id,
                'title' => $this->title,
                'date' => $this->date,
                'action' =>$this->action
            ],
        ];
    }


}
