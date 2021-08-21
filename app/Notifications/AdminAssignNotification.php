<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminAssignNotification extends Notification
{
    use Queueable;
    public $company, $location, $name, $email, $password;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($company, $location, $name, $email, $password)
    {
        $this->company = $company;
        $this->location = $location;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
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
            ->subject('Invited as admin at ' . $this->company . ' , ' . $this->location)
            ->greeting('Dear ' . $this->name)
            ->line('You have invited as admin at ' . $this->company . ' , ' . $this->location)
            ->line('Email : ' . $this->email)
            ->line('Password : ' . $this->password)
            ->action('Login Here', url('/'))
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
