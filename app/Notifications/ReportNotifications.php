<?php

namespace App\Notifications;

use Illuminate\Broadcasting\Channel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class ReportNotifications extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $action;
    public function __construct($data)
    {
        $this->data = $data;
        $this->action = route('admin.reports.showAvailabilityReport', ['park_id' => dateTime()?->park_id, 'from' => dateTime()?->date, 'to' => dateTime()?->date]);


    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => $this->data['title'],
            'user_id' => $this->data['user_id'],
            'action' => $this->action

        ];
    }

    public function toArray($notifiable)
    {
        return [
            'title' => $this->data['title'],
            'user_id' => $this->data['user_id'],
            'action' => $this->action

        ];
    }


    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'title' => $this->data['title'],

        ]);
    }

    public function broadcastOn()
    {
        return new Channel('report');

    }

}
