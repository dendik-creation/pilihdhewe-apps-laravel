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
        // Update Event Status
        $today = Carbon::now();
        $events = Event::all();
        foreach ($events as $item) {
            if($today->between($item->start_date, $item->end_date)){
                $item->update(['status' => 'Active']);
            }
            elseif($today->greaterThan($item->end_date)){
                $item->update(['status' => 'Selesai']);
            }else{
                $item->update(['status' => 'Inactive']);
            }
        }
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
