<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\PicoAPI;
use App\Services\WiFi2BLEAPI;
use Carbon\Carbon;

class DeskChecker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-desk';

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
        $error = false;

        // Fetch all desks
        $desks = $wiFi2BLE->getAllDesks();
        foreach ($desks as $deskId) {
            $data = $wiFi2BLE->getDeskData($deskId);

            if ($data['state']['status'] !== 'Normal')
                $error = true;
        }

        // Handle error states
        if ($error) {
            $pico->error();
        } else {
            $pico->errorEnd();
        }
    }
}
