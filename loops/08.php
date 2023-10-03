<?php

class NumberSquare
{
    public static function print(int $min, int $max): void
    {
        for ($i = $min; $i < $max + 1; $i++) {
            for ($j = 0; $j < $max; $j++) {
                echo $i + $j > $max ? $i + $j - $max : $i + $j;
            }
            echo PHP_EOL;
        }
    }
}

$min = (int)readline("Min> ");
$max = (int)readline("Max> ");
NumberSquare::print($min, $max);