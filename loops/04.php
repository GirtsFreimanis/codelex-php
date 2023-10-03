<?php

class FizzBuzz
{
    public static function printFizzBuzz(int $maxValue): void
    {
        for ($i = 1; $i < $maxValue + 1; $i++) {
            $log = "";
            $log .= $i % 3 === 0 ? "Fizz" : "";
            $log .= $i % 5 === 0 ? "Buzz" : "";
            echo strlen($log) === 0 ? $i . " " : $log . " ";

            if ($i % 20 === 0) echo PHP_EOL;
        }
    }
}

$maxValue = (int)readline("Max value> ");
FizzBuzz::printFizzBuzz($maxValue);