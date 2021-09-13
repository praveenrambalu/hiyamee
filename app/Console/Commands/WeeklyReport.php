<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\WeeklyReport as NotificationsWeeklyReport;
use Illuminate\Console\Command;

class WeeklyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weekly:report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Weekly Report for superadmin';

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
        $admins = User::where('user_type', 'superadmin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new NotificationsWeeklyReport);
        }
        $this->info('Weekly Update has been send successfully');
    }
}
