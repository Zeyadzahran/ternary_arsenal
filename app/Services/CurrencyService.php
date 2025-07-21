<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CurrencyService
{
    protected string $baseUrl = 'https://api.freecurrencyapi.com/v1/';
    protected string $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.currency.apikey');
    }

    public function convert(float $amount, string $from, string $to): float
    {
        if ($from === $to) return $amount;

        $rates = Cache::get("exchange_rates_{$from}");

        if (!$rates) {
            $rates = $this->fetchAndCacheRates($from);
        }

        if (!isset($rates[$to])) {
            logger()->error('Currency conversion failed.', ['from' => $from, 'to' => $to, 'rates' => $rates]);
            return $amount;
        }

        $rate = $rates[$to];
        return round($amount * $rate, 2);
    }

    protected function fetchAndCacheRates(string $base): array
    {
        $response = Http::get($this->baseUrl . 'latest', [
            'apikey' => $this->apiKey,
            'base_currency' => $base
        ]);

        $data = $response->json();

        if (!isset($data['data']) || !is_array($data['data'])) {
            logger()->error('Failed to fetch currency rates.', ['response' => $data]);
            return [];
        }

        Cache::put("exchange_rates_{$base}", $data['data'], now()->addDay());

        return $data['data'];
    }
}
