<?php

$lowerBound = 1;
$upperBound = 100;
$sum = 0;

for ($i = $lowerBound; $i <= $upperBound; $i++) {
    $sum += $i;
}
$average = $sum / $upperBound;
echo "the sum of $lowerBound to $upperBound is $sum\nthe average is $average";