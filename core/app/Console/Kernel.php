<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\QuickCronHourly',
        'App\Console\Commands\QuickCronDaily',
        'App\Console\Commands\PlanChecker',
        'App\Console\Commands\TestCronCommand',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('cron:quick-cron-hourly')->hourly();
        $schedule->command('cron:quick-cron-daily')->daily();
        $schedule->command('cron:plan-checker')->daily();
        
        $schedule->command('cron:test')->everyMinute();
     

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
