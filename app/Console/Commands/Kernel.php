<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
class Kernel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:kernel';
    protected $commands = [
        \App\Console\Commands\SendNotifications::class,
    ];
    

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('send:notifications')->everyMinute();
    }
    


}
