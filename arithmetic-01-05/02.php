<?php

function checkOddEven($number): void
{
    if ($number % 2 == 0) {
        echo "$number is an Even number";
    } else {
        echo "$number is an Odd number";
    }
}

checkOddEven(6);
echo "\nbye!";