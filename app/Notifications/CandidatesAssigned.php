<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class CandidatesAssigned extends Notification
{
    use Queueable;
    public $user, $count, $names, $date;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $count, $names, $date)
    {
        $this->user = $user;
        $this->count = $count;
        $this->names = $names;
        $this->date = $date;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Dear ' . $this->user)
            ->line(Auth::user()->name . ' have added ' . $this->count . ' candidates')
            ->line($this->names)
            ->line('Please check it on your dashboard')
            ->action('Check here', url('/candidates'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
