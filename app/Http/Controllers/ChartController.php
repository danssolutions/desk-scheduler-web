<?php

namespace App\Http\Controllers;

use App\Models\ChartModel;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function loadGraphPage()
    {
        $chart_models = ChartModel::where('time', '>=', now()->subDay())->get();

        // Group data by desk_id
        $groupedData = $chart_models->groupBy('desk_id');

        $datasets = [];
        $labels = [];

        foreach ($groupedData as $deskId => $records) {
            // Extract time (X-axis labels) and heights (Y-axis data) for this desk
            $times = $records->pluck('time')->map(function ($time) {
                return \Carbon\Carbon::parse($time)->format('H:i'); // Format time as "HH:mm"
            });

            $heights = $records->pluck('height');

            // Use times from the first desk as the primary X-axis labels
            if (empty($labels)) {
                $labels = $times->unique()->values();
            }

            $datasets[] = [
                'label' => "Desk $deskId",
                'data' => $heights,
                'borderWidth' => 1,
                'backgroundColor' => $this->randomColor(),
                'borderColor' => $this->randomColor(),
            ];
        }

        return view('analytics', compact('labels', 'datasets'));
    }

    // Helper function to generate random colors for each dataset
    private function randomColor()
    {
        $randomColor = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
        return $randomColor;
    }
}