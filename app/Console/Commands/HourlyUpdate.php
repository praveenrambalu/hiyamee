<?php

namespace App\Console\Commands;

use App\Models\Candidate;
use App\Models\User;
use App\Notifications\InterviewReminder;
use Illuminate\Console\Command;

class HourlyUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hour:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a reminder before 1 hour Interview';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = date("Y-m-d", strtotime('today'));
        $now = date("H:i", strtotime('+1 hour'));
        $candidates = Candidate::where('interview_outcome', 'Ready')
            ->where('interview_date', $today)
            ->where('status', 'active')
            ->where('interview_completed_at', NULL)
            ->where('interview_time', '<=', $now)
            ->distinct()->get(['allocated_to']);
        if (count($candidates) > 0) {
            foreach ($candidates as $candidate) {
                if ($rec = User::find($candidate->allocated_to)) {
                    $rec->notify(new InterviewReminder($rec->name));
                }
            }
        }
        $this->info('Hourly Update has been send successfully');
    }
}
