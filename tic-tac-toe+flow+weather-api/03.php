<?php

$number = readline("enter number> ");
$numberArray = str_split($number);
$digits = 0;
foreach ($numberArray as $numbers) {
    $digits++;
}
echo "$number has $digits digits";