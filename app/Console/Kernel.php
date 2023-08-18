<?php

namespace App\Console;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->call(function(){
        //     Event::where('start_date', Carbon::now()->toDateString())->update([
        //         'status' => 'Active'
        //     ]);
        //     Event::where('end_date', Carbon::now()->toDateString())->update([
        //         'status' => 'Inactive'
        //     ]);
        // })->hourly();
        $schedule->command('sanctum:prune-expired --hours=2');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
