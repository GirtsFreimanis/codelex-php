<?php

//create element pool
$elements = [
    $rock = "rock", //beats $scissors, $lizard
    $paper = "paper", //beats $rock, $spock
    $scissors = "scissors", //beats $paper, $lizard
    $lizard = "lizard", //beats $paper, $spock
    $spock = "spock", //beats $rock, $scissors
];

//create table which determines what can beat what
//$rock can beat $scissors and $lizard
$table = [
    $rock => [$scissors, $lizard],
    $paper => [$rock, $spock],
    $scissors => [$paper, $lizard],
    $lizard => [$paper, $spock],
    $spock => [$rock, $scissors]
];
//computer selects element
$computerSelection = $elements[array_rand($elements)];

echo "computer picks $computerSelection\n";
echo "computer can beat " . $table[$computerSelection][0] . " and " . $table[$computerSelection][1] . PHP_EOL;

$userSelection = strtolower(readline("pick your element: " . implode(", ", $elements) . "> "));


if (in_array($userSelection, $elements) === false) {
    echo "\npick a valid element!";
    exit;
}

//tie possibility
if ($userSelection === $computerSelection) {
    echo "it's a tie!!";
    exit;
}

//check if value is in table array which is associative
if (in_array($userSelection, array_values($table[$computerSelection]))) {
    echo "computer beat your $userSelection with $computerSelection";
} elseif (in_array($computerSelection, array_values($table[$userSelection]))) {
    echo "you beat computer's $computerSelection with your $userSelection";
}
