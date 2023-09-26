<?php

$words = ["rabbit", "foreign", "teacup", "computer"];
$choice = "o";
while ($choice != "n") {
    $fullWord = $words[array_rand($words)];
    $wordArray = str_split($fullWord);
    $guessArray = [];
    foreach ($wordArray as $char) {
        $guessArray[] = "_";
    }
    $misses = [];
    while (true) {
        echo "\n======================================================\n\n";
        echo "Word: ";
        foreach ($guessArray as $guessChar) {
            echo "$guessChar ";
        }
        echo PHP_EOL . PHP_EOL;
        echo "Misses: ";
        foreach ($misses as $miss) {
            echo "$miss ";
        }
        echo PHP_EOL;

        if ($wordArray === $guessArray) break; // check if word is fully guessed

        $charGuess = strtolower(readline("\nenter char>"));
        while (strlen($charGuess) != 1) {
            echo "\nenter ONE character" . PHP_EOL;
            $charGuess = strtolower(readline("\nenter char>"));
        }
        //check if guessed character is a miss and add it to $misses
        if (!in_array($charGuess, $wordArray) && !in_array($charGuess, $misses)) {
            $misses[] = $charGuess;
            continue;
        }
        //if character is in guessable word then add it to guessArray
        if (in_array($charGuess, $wordArray) && !in_array($charGuess, $guessArray)) {
            for ($i = 0; $i < count($wordArray); $i++) {
                if ($charGuess === $wordArray[$i]) {
                    $guessArray[$i] = $charGuess;
                }
            }
        }
    }
    echo "\n\nyou got it!\n";
    $choice = "o";
    while ($choice != "y" && $choice != "n") {
        $choice = strtolower(readline("play again? (y/n)> "));
    }
    if ($choice === "n") exit;
}
