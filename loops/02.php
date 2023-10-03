<?php

$base = (int)readline("input number> ");
$exponent = (int)readline("$base^X enter X> ");
$result = 1;

for ($i = 0; $i < $exponent; $i++) {
    $result *= $base;
}

echo "result is $result";