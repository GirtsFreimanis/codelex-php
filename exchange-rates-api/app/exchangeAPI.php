<?php

declare(strict_types=1);

namespace App;

class exchangeAPI
{
    private string $baseUrl;
    private string $apiKey;
    private string $fullUrl;

    public function __construct(
        string $baseUrl,
        string $apiKey
    )
    {
        $this->baseUrl = $baseUrl;
        $this->apiKey = $apiKey;
    }

    public function getExchange(
        int    $baseAmount,
        string $baseCurrency,
        string $exchangeCurrency
    ): ?exchange
    {
        $this->fullUrl = $this->baseUrl . $this->apiKey . "&format=1";
        $apiData = file_get_contents($this->fullUrl);
        $result = json_decode($apiData);
        if (!isset($result->rates->$baseCurrency) || !isset($result->rates->$exchangeCurrency)) {
            return null;
        }

        return new exchange(
            $baseAmount / $result->rates->$baseCurrency,
            $baseCurrency,
            $exchangeCurrency,
            $result->rates->$exchangeCurrency,
        );
    }
}