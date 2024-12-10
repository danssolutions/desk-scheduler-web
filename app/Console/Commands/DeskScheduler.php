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
        // Fetch desks and handle errors every minute
        $wiFi2BLE = new WiFi2BLEAPI(env('WIFI2BLE_BASE_URL'), env('WIFI2BLE_API_KEY'));
        $pico = new PicoAPI(env('PICO_BASE_URL'));

        $now = Carbon::now();
        $alarms = Post::where('time_from', $now->format('H:i'))
            ->whereJsonContains('days', $now->format('l'))
            ->get();

        foreach ($alarms as $alarm) {
            $deskData = $wiFi2BLE->getDeskData($alarm->desk_id);

            // Move desk to position
            $wiFi2BLE->updateDeskState($alarm->desk_id, ['position_mm' => $alarm->position]);

            // Trigger alarm
            $pico->triggerAlarm($alarm->alarm_sound, $alarm->position);
        }
    }
}
