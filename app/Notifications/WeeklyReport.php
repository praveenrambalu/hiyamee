<?php

namespace App\Notifications;

use App\Models\Candidate;
use App\Models\Company;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class WeeklyReport extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $companies = count(Company::where('status', 'active')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get());
        $jobs = count(Job::where('status', 'active')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get());
        $candidates = count(Candidate::where('status', 'active')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get());
        $SelectedCandidates = count(Candidate::where('status', 'active')->where('interview_outcome', 'Selected')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get());
        $RejectedCandidates = count(Candidate::where('status', 'active')->where('interview_outcome', 'Rejected')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get());

        $data = "
            <table>
                <tr>
                    <th colspan='2' style='text-align:center'>
                        <h3>Weekly Report </h3>
                    </th>
                </tr>
                <tr style='text-align:left'>
                <th>Total Companies </th>
                <th>" . $companies . "</th>
                </tr>
                <tr style='text-align:left'>
                <th>Total Jobs </th>
                <th>" . $jobs . "</th>
                </tr>
                <tr style='text-align:left'>
                <th>Total Applications </th>
                <th>" . $candidates . "</th>
                </tr>
                <tr style='text-align:left'>
                <th>Selected Applications </th>
                <th>" . $SelectedCandidates . "</th>
                </tr>
                <tr style='text-align:left'>
                <th>Rejected Applications </th>
                <th>" . $RejectedCandidates . "</th>
                </tr>
            </table>
            ";
        return (new MailMessage)
            ->subject('Weekly Report HiyameeX')
            ->greeting('Dear Admin')
            ->line('Please check the weekly report of HiyameeX')
            ->line(new HtmlString(" <table>
            <tr>
                <th colspan='2' style='text-align:center'>
                    <h3 style='text-align:center'>Weekly Report </h3>
                </th>
            </tr>
            <tr style='text-align:left'>
            <th>Total Companies </th>
            <th style='padding-left:25px'>" . $companies . "</th>
            </tr>
            <tr style='text-align:left'>
            <th>Total Jobs </th>
            <th style='padding-left:25px'>" . $jobs . "</th>
            </tr>
            <tr style='text-align:left'>
            <th>Total Applications </th>
            <th style='padding-left:25px'>" . $candidates . "</th>
            </tr>
            <tr style='text-align:left'>
            <th>Selected Applications </th>
            <th style='padding-left:25px'>" . $SelectedCandidates . "</th>
            </tr>
            <tr style='text-align:left'>
            <th>Rejected Applications </th>
            <th style='padding-left:25px'>" . $RejectedCandidates . "</th>
            </tr>
        </table>"))
            ->action('Login', url('/'))
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
