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
//determines which elements can computer beat
$computer0 = $table[$computerSelection][0];
$computer1 = $table[$computerSelection][1];

echo "computer picks $computerSelection\n";
echo "computer can beat $computer0 and $computer1\n";

$userSelection = strtolower(readline("pick your element: " . implode(", ", $elements) . "> "));
//determines which elements can player beat
$user0 = $table[$userSelection][0];
$user1 = $table[$userSelection][1];


if (in_array($userSelection, $elements) === false) {
    echo "\npick a valid element!";
    exit;
}

//tie possibility
if ($userSelection === $computerSelection) {
    echo "it's a tie!!";
    exit;
}

//if user picks an element which is under $table[$userSelection][0] or [1] you lose. and vice versa.
if ($computer0 === $userSelection || $computer1 === $userSelection) {
    echo "computer beat your $userSelection with $computerSelection";
} elseif ($user0 === $computerSelection || $user1 === $computerSelection) {
    echo "you beat computer's $computerSelection with your $userSelection";
}
