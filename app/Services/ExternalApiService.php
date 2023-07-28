<?php

namespace App\Services;

use Exception;
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
        try {
            $response = Http::get($this->api_url . '/barang');
            if ($response->successful() && $response['status'] === 'success') {
                return collect($response['data']);
            }
        } catch (Exception $e) {
            Log::error('API Request Exception: ' . $e->getMessage());
        }
        return collect();
    }

    public function getItemById($id)
    {
        try {
            $url = $this->api_url . '/barang/' . $id;
            $response = Http::get($url);
            if ($response->successful() && $response['status'] === 'success') {
                return collect($response['data']);
            }
        } catch (Exception $e) {
            Log::error('API Request Exception: ' . $e->getMessage());
        }
        return collect();
    }

    public function buyItem($id, $quantity)
    {

        try {
            $url = $this->api_url . '/barang/buy/' . $id;
            $client = new Client([
                'headers' => ['Content-Type' => 'application/json']
            ]);
            $quantity = (int)$quantity;
            $response = $client->post($url, [
                'json' => [
                    'quantity' => $quantity,
                ]
            ]);
        } catch (RequestException $e) {
            Log::error('API Request Exception: ' . $e->getMessage());
        }
    }
}
