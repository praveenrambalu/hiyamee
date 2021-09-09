<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InterviewsCompletedNotification extends Notification
{
    use Queueable;
    public $user, $company, $jobtitle;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $company, $jobtitle)
    {
        $this->user = $user;
        $this->company = $company;
        $this->jobtitle = $jobtitle;
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
            ->subject('All Interviews Completed on Job ' . $this->jobtitle)
            ->greeting('Dear  ' . $this->user)
            ->line('All the Interviews on the Job ' . $this->jobtitle . '  at ' . $this->company . ' has Completed ')
            ->line('Please check on your dashboard')
            ->action('Check now', url('/candidates'))
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
