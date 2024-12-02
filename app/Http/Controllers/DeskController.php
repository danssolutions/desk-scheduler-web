<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DeskController extends Controller
{
    public function test()
    {
        $response = Http::get('http://192.168.43.38/api/prealarm');
        $jsonData = $response->json();
        dd($jsonData);   
    }
}
