<?php
$apiKey = "c7e4f38f8dcf50f1bf807b7b70c4c45e";
$city = readline("enter city> ");
$link = "https://api.openweathermap.org/data/2.5/weather?q=" . $city . "&appid=" . $apiKey . "&units=metric";
//https://api.openweathermap.org/data/2.5/weather?q=liepaja&appid=c7e4f38f8dcf50f1bf807b7b70c4c45e&units=metric
$cityInfo = json_decode(file_get_contents($link));
var_dump($cityInfo);

echo "\ncurrent weather in: $city\n";
echo "current temp: " . round($cityInfo->main->temp) . "°C\n";
echo "humidity: " . $cityInfo->main->humidity . "%\n";
echo "wind speed: " . $cityInfo->wind->speed . "m/s\n";
echo "outside: " . $cityInfo->weather[0]->description . "\n";
