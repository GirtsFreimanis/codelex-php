<?php

function difference($x, $y): bool
{
    return $x === 15 || $y === 15 || $x + $y === 15 || $x - $y === 15 || $y - $x === 15;
}

$x = -15;
$y = 9;

if (difference($x, $y)) {
    echo "$x, $y difference is true";
} else {
    echo "$x, $y difference is false";
}