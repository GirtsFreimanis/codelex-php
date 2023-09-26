<?php
function display_board(array $gameBoard)
{
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            echo " ";
            echo $gameBoard[$i][$j] ?? " ";
            echo $j < 2 ? " |" : "";
        }
        echo "\n---+---+---\n";
    }
}

function getCoordinates(array $gameBoard, string $symbol): array
{
    while (true) {
        display_board($gameBoard);

        $location = readline("'$symbol', choose your location (row column)> ");
        $coordinates = explode(" ", $location);
        //check if provided two values
        if (count($coordinates) != 2) {
            echo "need to enter two values\n";
            continue;
        }
        //check if provided values are numeric
        if (!is_numeric($coordinates[0]) || !is_numeric($coordinates[1])) {
            echo "provided values are not numeric!\n";
            continue;
        }
        //turn given coordinate values to integers
        $coordinates[0] = (int)$coordinates[0];
        $coordinates[1] = (int)$coordinates[1];

        //check if given values are in bound of game board array
        if ($coordinates[0] > 2 || $coordinates[1] > 2 || $coordinates[0] < 0 || $coordinates[1] < 0) {
            echo "provided values are out of bound of game board!\n";
            continue;
        }
        //check if given coordinates are already taken
        if (isset($gameBoard[$coordinates[0]][$coordinates[1]])) {
            echo "coordinates already taken!\n";
            continue;
        }
        break;
    }
    return $coordinates;
}

function checkWinner(array $winLines, array $gameBoard): bool
{
    //check each $WinLine for potential winner
    foreach ($winLines as $line) {
        $tempLine = [];
        foreach ($line as $coords) {
            //check if next value in $tempLine is null
            if (!isset($gameBoard[$coords[0]][$coords[1]])) {
                break;
            }
            $tempLine[] = $gameBoard[$coords[0]][$coords[1]];
        }
        if (count($tempLine) === 3 && count(array_unique($tempLine)) === 1) {
            return true;
        }
    }
    return false;
}

$winLines = [
    [[0, 0], [0, 1], [0, 2]],//first row
    [[1, 0], [1, 1], [1, 2]],//second row
    [[2, 0], [2, 1], [2, 2]],//third row

    [[0, 0], [1, 0], [2, 0]],//first column
    [[0, 1], [1, 1], [2, 1]],//second column
    [[0, 2], [1, 2], [2, 2]],//third column

    [[0, 0], [1, 1], [2, 2]],// X line \
    [[0, 2], [1, 1], [2, 0]] // X line /
];
$gameBoard = [];
for ($i = 0; $i < 9; $i++) {
    $symbol = $i % 2 === 0 ? "X" : "O";

    $coordinates = getCoordinates($gameBoard, $symbol);
    $gameBoard[$coordinates[0]][$coordinates[1]] = $symbol;

    if (checkWinner($winLines, $gameBoard)) {
        display_board($gameBoard);
        echo "\n$symbol is the winner!\n";
        exit;
    }
}
echo "\nit's a tie!\n";