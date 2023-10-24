<?php

declare(strict_types=1);

require_once "vendor/autoload.php";

use App\exchangeAPI;

$baseUrl = "http://api.exchangeratesapi.io/v1/latest?access_key=";
$apiKey = fgets(fopen("API-Key.txt", "r"));

$apiData = new exchangeAPI($baseUrl, $apiKey);
echo "ex: '100 USD'\n";
$baseInput = readline("[amount] [base currency]>");
$isSeperated = strpos($baseInput, " ");

if (!$isSeperated) {
    echo "input not seperated by space!";
    exit;
}

$search = explode(" ", trim(strtoupper($baseInput)));
if (count($search) > 2) {
    echo "provided more than two arguments!";
    exit;
}

$baseAmount = (int)$search[0];
$baseCurrency = strtoupper($search[1]);

if (!is_numeric($baseAmount)) {
    echo "'$baseAmount' is not numeric";
    exit;
}

if (!ctype_alpha($baseCurrency)) {
    echo "'$baseCurrency' is not alphabetical";
    exit;
}

echo "ex: 'EUR'\n";
$exchangeCurrency = strtoupper(readline("[exchange currency]> "));

$exchange = $apiData->getExchange(
    $baseAmount,
    $baseCurrency,
    $exchangeCurrency
);

if ($exchange === null) {
    echo "currency not found!";
    exit;
}
echo round($exchange->getExchangeAmount(), 2);
