<?php

declare(strict_types=1);

namespace App;

class exchange
{
    private float $baseAmount;
    private string $baseCurrency;
    private string $exchangeCurrency;
    private float $exchangeRate;

    public function __construct(
        float  $baseAmount,
        string $baseCurrency,
        string $exchangeCurrency,
        float  $exchangeRate
    )
    {
        $this->baseAmount = $baseAmount;
        $this->baseCurrency = $baseCurrency;
        $this->exchangeCurrency = $exchangeCurrency;
        $this->exchangeRate = $exchangeRate;
    }

    public function getBaseAmount(): float
    {
        return $this->baseAmount;
    }

    public function getBaseCurrency(): string
    {
        return $this->baseCurrency;
    }

    public function getExchangeCurrency(): string
    {
        return $this->exchangeCurrency;
    }

    public function getExchangeRate(): float
    {
        return $this->exchangeRate;
    }

    public function getExchangeAmount(): float
    {
        return $this->exchangeRate * $this->baseAmount;
    }
}