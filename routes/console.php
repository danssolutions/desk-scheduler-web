<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\Http;

Schedule::command('app:update-desk-heights')->everyFiveMinutes();
Schedule::command('app:schedule-desk')->everyMinute();
Schedule::command('app:send-notification')->everyMinute();
Schedule::command('app:check-desk')->everyFiveSeconds();