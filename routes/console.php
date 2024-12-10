<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\Http;

// Schedule a task to run weekly at a specific time
// Schedule::call(function () {
//     // Task logic goes here
//     Http::get('http://192.168.43.38/api/prealarm');
//     \Log::info("Alarm task executed");
// })->everyMinute();

Schedule::command('app:check-desk')->everyFiveSeconds();
Schedule::command('app:schedule-desk')->everyMinute();

// big TODO list here:
// every minute, the scheduler must do at least the following:
// - fetch all desk IDs and data
// - if a specific desk reports an error, send a error call to Pico
// - if there's no longer an error, send a error end call to Pico
// this can be done either every minute (by DB comparison) or by adding scheduler commands on a specific hour during run time:
// - check if specific alarm is about to be triggered (5 mins before alarm time)
// - check if specific alarm must be triggered now, if yes:
//      - get alarm sound type
//      - get position to be set
//      - get Pico's IP address
//      - send API call to wifi2ble box to move desk to pos
//      - use returned value, and send pos and alarm melody to Pico