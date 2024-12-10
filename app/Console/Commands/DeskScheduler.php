<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\PicoAPI;
use App\Services\WiFi2BLEAPI;
use App\Models\User;
use App\Models\Post;
use Carbon\Carbon;

class DeskScheduler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:schedule-desk';

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
        // Initialize services
        $wiFi2BLE = new WiFi2BLEAPI(env('WIFI2BLE_BASE_URL'), env('WIFI2BLE_API_KEY'));
        $pico = new PicoAPI(env('PICO_BASE_URL'));

        // Get the current day and time, with timezone adjustment for GMT+1
        $currentDay = Carbon::now()->format('l');
        $currentTime = Carbon::now()->addHours(1)->format('H:i');
        $preAlarmTime = Carbon::now()->addHours(1)->addMinutes(3)->format('H:i'); // 3 minutes ahead

        // Fetch alarms for the exact current time
        $alarms = Post::where('time_from', $currentTime)
            ->where('days', $currentDay)
            ->get();

        // Fetch alarms for pre-alarm time (3 minutes ahead)
        $preAlarms = Post::where('time_from', $preAlarmTime)
            ->where('days', $currentDay)
            ->get();

        // Handle pre-alarms (3 minutes before the alarm time)
        foreach ($preAlarms as $preAlarm) {
            if (!is_null($preAlarm->desk_id)) {
                $pico->preAlarm();
            }
        }

        // Handle alarms for the exact current time
        foreach ($alarms as $alarm) {
            if (!is_null($alarm->desk_id)) {
                // Move desk to position
                $wiFi2BLE->updateDeskState($alarm->desk_id, ['position_mm' => $alarm->height]);

                // Trigger alarm
                $pico->triggerAlarm($alarm->alarm_sound, $alarm->height);
            }
        }
    }
}
