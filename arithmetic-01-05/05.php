<?php

$numberToGuess = rand(1, 100);

echo "I'm thinking of a number between 1-100.  Try to guess it.\n";
$guess = (int)readLine("> ");

if ($numberToGuess === $guess) {
    echo "You guessed it!  What are the odds?!?";
} elseif ($numberToGuess < $guess) {
    echo "Sorry, you are too high.  I was thinking of $numberToGuess";
} else {
    echo "Sorry, you are too low.  I was thinking of $numberToGuess";
}