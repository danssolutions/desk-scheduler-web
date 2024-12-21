<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\WiFi2BLEAPI;
use App\Models\ChartModel;
use Carbon\Carbon;

class UpdateDeskHeights extends Command
{
    protected $signature = 'app:update-desk-heights';
    protected $description = 'Fetch and store desk heights from the API';

    public function handle()
    {
        $api = new WiFi2BLEAPI(env('WIFI2BLE_BASE_URL'), env('WIFI2BLE_API_KEY'));
        $desks = $api->getAllDesks();

        foreach ($desks as $deskId) {
            $deskData = $api->getDeskData($deskId);
            if (!empty($deskData) && isset($deskData['state']['position_mm'])) {
                ChartModel::create([
                    'desk_id' => $deskId,
                    'height' => $deskData['state']['position_mm'],
                    'time' => Carbon::now()->addHours(1),
                ]);
            }
        }

        $this->info('Desk heights updated successfully.');
    }
}