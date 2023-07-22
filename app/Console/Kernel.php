<?php

namespace App\Console;

use App\Jobs\CheckStatusInstallmentJob;
use App\Jobs\CheckTableInstallmentJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->job(new CheckTableInstallmentJob)->dailyAt('13:00');
        $schedule->job(new CheckStatusInstallmentJob)->dailyAt('13:00');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
