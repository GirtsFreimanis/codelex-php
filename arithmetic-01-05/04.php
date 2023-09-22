<?php

$start = 1;
$end = 10;
$sum = 1;

for ($i = $start; $i <= $end; $i++) {
    $sum *= $i;
}

echo $sum;