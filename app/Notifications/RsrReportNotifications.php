<?php

namespace App\Notifications;

use Illuminate\Broadcasting\Channel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class RsrReportNotifications extends Notification
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
        $this->action = route('admin.rsr_reports.show', $this->data['id']);

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
            'ride_id' => $this->data['ride_id'],
            'user_id' => $this->data['user_id'],
            'id' => $this->data['id'],
            'action' => $this->action
        ];
    }

    public function toArray($notifiable)
    {
        return [
            'title' => $this->data['title'],
            'ride_id' => $this->data['ride_id'],
            'user_id' => $this->data['user_id'],
            'id' => $this->data['id'],
            'action' => $this->action

        ];
    }


    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'title' => $this->data['title'],
            'id' => $this->data['id'],
            'type' => 'rsr_report'

        ]);
    }

    public function broadcastOn()
    {
        return new Channel('rsr_report');

    }

}
