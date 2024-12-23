<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PicoAPI
{
    private string $baseUrl;

    public function __construct(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    public function sendCommand(string $endpoint, array $params = []): array
    {
        $response = Http::get($this->baseUrl . $endpoint, $params);
        return $response->json();
    }

    public function triggerAlarm(string $melody, int $position): array
    {
        return $this->sendCommand('/api/alarm', ['melody' => $melody, 'position' => $position]);
    }

    public function preAlarm(): array
    {
        return $this->sendCommand('/api/prealarm');
    }

    public function error(): array
    {
        return $this->sendCommand('/api/error');
    }

    public function errorEnd(): array
    {
        return $this->sendCommand('/api/errend');
    }

    public function login(string $username): array
    {
        try {
            $formattedUsername = str_replace(' ', '_', $username); // replace spaces w/ underscores for Pico to parse
            return $this->sendCommand('/api/login', ['username' => $formattedUsername]);
        } catch (\Exception $e) {
            return [];
        }
    }

    public function logout(): array
    {
        try {
            return $this->sendCommand('/api/logout');
        } catch (\Exception $e) {
            return [];
        }
    }
}