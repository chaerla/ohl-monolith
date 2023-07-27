<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ExternalApiService
{
    protected $api_url;

    public function __construct()
    {
        $this->api_url = env('API_URL', 'http://localhost:3000');
    }

    public function getAllItems()
    {
        $response = Http::get($this->api_url . '/barang');
        if ($response->successful() && $response['status'] === 'success') {
            return collect($response['data']);
        }
        return collect();
    }

    public function getItemById($id)
    {
        $url = $this->api_url . '/barang/' . $id;
        $response = Http::get($url);
        if ($response->successful() && $response['status'] === 'success') {
            return collect($response['data']);
        }
        return collect();
    }

    public function buyItem($id, $quantity)
    {
        $url = $this->api_url . '/barang/buy/' . $id;
        $client = new Client([
            'headers' => ['Content-Type' => 'application/json']
        ]);

        try {
            $quantity = (int)$quantity;
            $response = $client->post($url, [
                'json' => [
                    'quantity' => $quantity,
                ]
            ]);
        } catch (RequestException $e) {
            // Log the error or handle it as needed
            Log::error('API Request Exception: ' . $e->getMessage());
        }
    }
}
