<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Http;

class NotificationDesk extends Notification
{
    use Queueable;

    private $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        $response = Http::get('http://192.168.43.38/api/prealarm');

        return (new MailMessage)
            ->greeting($this->details['greetings'])
            ->line($this->details['body'])
            ->line($this->details['lastline']);


    }

    public function toArray($notifiable): array
    {
        return $this->details; // optional, for database notifications
    }
}
