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
    public $user_id;
     public $start;
     public $end;
     public $date;
     public $close_date;

    public function __construct($data= [])
    {
        
        $this->user_id = $data['user_id'];
        $this->start = $data['start'];
        $this->end = $data['end'];
        $this->date = $data['date'];
        $this->close_date = $data['close_date'];
    }

    public function broadcastOn()
    {
        return ['timeSlot-notification'];

/*         return  ('timeSlot-notification');
 */    }

 public function broadcastAs() { 
    
    return 'new-message'; 
}


}
