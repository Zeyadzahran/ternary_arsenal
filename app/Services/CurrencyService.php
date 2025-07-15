<?php

namespace App\Services;

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

        $response = Http::get($this->baseUrl . 'latest', [
            'apikey' => $this->apiKey,
            'base_currency' => $from,
            'currencies' => $to
        ]);

        $data = $response->json();
        // dd($data);
        
        if (!isset($data['data'][$to])) {
            logger()->error('Currency conversion failed.', ['response' => $data]);
            return $amount;
        }

        $rate = $data['data'][$to];
        // dd($rate);

        return round($amount * $rate, 2);
    }
}
