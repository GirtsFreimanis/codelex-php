<?php

$letters = [
    "2" => ["A", "B", "C"],
    "3" => ["D", "E", "F"],
    "4" => ["G", "H", "I"],
    "5" => ["J", "K", "L"],
    "6" => ["M", "N", "O"],
    "7" => ["P", "Q", "R", "S"],
    "8" => ["T", "U", "V"],
    "9" => ["W", "X", "Y", "Z"]
];

$input = "";
$message = "";
echo "enter '0'\n";
while ($input != "0") {
    echo "ABC(2), DEF(3), GHI(4), JKL(5), MNO(6), PQRS(7), TUV(8), WXYZ(9).\n";
    echo "$message\n";
    $input = readline("enter message> ");
    $firstNumber = substr($input, 0, 1);
    $numberAmount = strlen($input);
    switch ($numberAmount) {
        case 1:
            $message .= $letters[$firstNumber][0];
            break;
        case 2:
            $message .= $letters[$firstNumber][1];
            break;
        case 3:
            $message .= $letters[$firstNumber][2];
            break;
        case 4:
            $message .= $letters[$firstNumber][3];
            break;
        default:
            echo "invalid input\n";
            break;
    }
}

