<?php 
namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestCronCommand extends Command
{
    protected $signature = 'cron:test';
    protected $description = 'Test cron job for demonstration';

    public function handle()
    {
        // Buraya cron işi gerçekleştirecek kodu yazın
        \Log::info('Test cron job is running: ' . now());
        $this->info('Test cron job executed successfully!');
    }
}

?>