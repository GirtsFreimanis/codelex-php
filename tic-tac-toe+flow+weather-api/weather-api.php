<?php
//api key is inside kay.txt which should be ignored by git for safety reasons in future
//for now it is reversed inside kay.txt so that gitHub doesn't get angry
$apiKeyPath = "kay.txt";
$apiKey = strrev(fgets(fopen($apiKeyPath, 'r')));
$city = readline("enter city> ");
$link = "https://api.openweathermap.org/data/2.5/weather?q=" . $city . "&appid=" . $apiKey . "&units=metric";
$cityInfo = json_decode(file_get_contents($link));

echo "\ncurrent weather in " . $cityInfo->name . ", " . $cityInfo->sys->country . "\n";
echo "current temp: " . round($cityInfo->main->temp) . "°C\n";
echo "humidity: " . $cityInfo->main->humidity . "%\n";
echo "wind speed: " . $cityInfo->wind->speed . "m/s\n";
echo "outside: " . $cityInfo->weather[0]->description . "\n";
