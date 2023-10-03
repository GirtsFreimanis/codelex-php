<?php

class RollTwoDice
{
    static public function roll(int $desiredSum): void
    {
        $sum = 0;
        while ($sum != $desiredSum) {
            $sum = 0;
            $diceOne = rand(1, 6);
            $diceTwo = rand(1, 6);
            $sum = $diceOne + $diceTwo;
            echo "$diceOne and $diceTwo = $sum\n";
        }
    }
}

$desiredSum = (int)readline("Desired sum> ");
RollTwoDice::roll($desiredSum);