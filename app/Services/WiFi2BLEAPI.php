<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WiFi2BLEAPI
{
    private string $baseUrl;
    private string $apiKey;

    public function __construct(string $baseUrl, string $apiKey)
    {
        $this->baseUrl = $baseUrl;
        $this->apiKey = $apiKey;
    }

    public function getAllDesks(): array
    {
        return Http::get("{$this->baseUrl}/api/v2/{$this->apiKey}/desks")->json();
    }

    public function getDeskData(string $deskId): array
    {
        return Http::get("{$this->baseUrl}/api/v2/{$this->apiKey}/desks/{$deskId}")->json();
    }

    public function updateDeskState(string $deskId, array $state): array
    {
        return Http::put("{$this->baseUrl}/api/v2/{$this->apiKey}/desks/{$deskId}/state", $state)->json();
    }
}