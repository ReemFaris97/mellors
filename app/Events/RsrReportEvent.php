<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RsrReportEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $action;
    public function __construct(public $user_id, public $title, public $date, public $id)
    {
        $this->action = route('admin.rsr_reports.show', $this->id);

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('User.Notifications.' . $this->user_id);
    }
    public function broadcastWith()
    {

        return [
            'data' => [
                'user_id' => $this->user_id,
                'title' => $this->title,
                'date' => $this->date,
                'id' => $this->id,
                'action'=>$this->action

            ],
        ];
    }


}
