<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class UserNotifications extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }
    public function toDatabase($notifiable)
    {
         return [
            'title' => $this->data['title'],
            'ride_id' => $this->data['ride_id'],
            'user_id' => $this->data['user_id'],
        ];
    }


//
//    public function toBroadcast($notifiable)
//    {
//        return new BroadcastMessage([
//            'title' => $this->data['title'],
//            'ride_id' => $this->data['ride_id'],
//            'user_id' => $this->data['user_id'],
//        ]);
//    }
    public function broadcastType()
    {
        return 'userNotification';
    }
}
