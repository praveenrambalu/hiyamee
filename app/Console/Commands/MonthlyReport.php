<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\MonthlyReport as NotificationsMonthlyReport;
use Illuminate\Console\Command;

class MonthlyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthly:report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Monthly Report for superadmin';

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
            $admin->notify(new NotificationsMonthlyReport);
        }
        $this->info('Monthly Update has been send successfully');
    }
}
