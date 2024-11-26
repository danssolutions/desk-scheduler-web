<?php

namespace App\Http\Controllers;

use App\Models\ChartModel;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function loadGraphPage()
    {
        $chart_models = ChartModel::all();



        $labels = [];
        $data = [];

        foreach ($chart_models as $value) {
            $labels[] = $value['height'];
            $data[] = $value['time'];
        }
        return view('analytics')
        ->with('labels', $labels)
        ->with('data', $data);    }
}
