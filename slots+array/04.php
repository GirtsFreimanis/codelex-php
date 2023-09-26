<?php

$firstArray = [];
$secondArray = [];

for ($i = 0; $i < 10; $i++) {
    $firstArray[$i] = rand(1, 100);
}
for ($i = 0; $i < 10; $i++) {
    $secondArray[] = $firstArray[$i];
}

$firstArray[count($firstArray) - 1] = -7;
foreach ($firstArray as $number) {
    echo "$number ";
}
echo PHP_EOL;
foreach ($secondArray as $number) {
    echo "$number ";
}