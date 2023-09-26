<?php
//symbol element creation
function createSymbol(string $symbolDisplay, int $minimumAmount, float $x2, float $x3, float $x4): stdClass
{
    $symbol = new stdClass();
    $symbol->symbolDisplay = $symbolDisplay;
    $symbol->minimumAmount = $minimumAmount;
    $symbol->x2 = $x2;
    $symbol->x3 = $x3;
    $symbol->x4 = $x4;
    return $symbol;
}

//x means what multiplier to give for that amount of elements in row
$A = createSymbol("🍒", 2, 0.5, 1, 2);
$B = createSymbol("🍋", 2, 1, 1.5, 3);
$C = createSymbol("🍉", 3, 0, 2, 4);
$D = createSymbol("🍇", 3, 0, 4, 5);
$E = createSymbol("🍑", 3, 0, 4, 5);
$F = createSymbol("💎", 2, 5, 10, 50);

//star symbol can appear only one per column and pays if there are two or more in table
//this symbol ignores lines
$S = new stdClass();
$S->symbolDisplay = "🌟";
$S->minimumAmount = 2;
$S->x2 = 2;
$S->x3 = 5;
$S->x4 = 25;

//element rarity defining
$table = [];
$elements = [$A, $A, $A, $A, $B, $B, $B, $C, $C, $C, $D, $D, $E, $E, $F, $S];
//winLines defines which lines must elements be in order for win scenario for each line
$winLines = [
    [[0, 0], [0, 1], [0, 2], [0, 3]],//first row
    [[1, 0], [1, 1], [1, 2], [1, 3]],//second row
    [[2, 0], [2, 1], [2, 2], [2, 3]],//third row
    [[1, 0], [0, 1], [0, 2], [1, 3]],//middle-top-top-middle
    [[1, 0], [2, 1], [2, 2], [1, 3]]//middle-bottom-bottom-middle
];

$totalWin = 0;
$bet = 10;
$bankBalance = 150; //starting cash

//table creation
echo "\nyou have $$bankBalance\n";
echo "\nwelcome. first time players get a voucher for $1.\n";
$totalCredits = 100;//totalCredits- used to play slot machine

$choice = 2;
while ($choice != "quit") {
    echo "\nremaining credits: $totalCredits\n";
    $choice = strtolower(readline("Enter 'options' or press ENTER to bet $bet> "));

    switch ($choice) {
        case "options":
            echo "\nenter 'deposit' to deposit money\n";
            echo "\nenter 'bet' to change bet amount\n";
            echo "\nenter 'withdraw' to withdraw money\n";
            echo "\nenter 'quit' to quit\n";
            break;

        case "deposit":
            echo "\nyou have $$bankBalance\n";
            $deposit = (float)readline("enter how much money to deposit> ");
            if ($deposit > $bankBalance) {
                echo "\nyou don't have enough $\n";
                break;
            }
            if ($deposit % 5 != 0) {
                echo "\ndeposit with increments in 5\n";
                break;
            }
            if ($deposit < 0) {
                echo "\ncannot deposit negative amount!\n";
                break;
            }
            $totalCredits += $deposit * 100;
            $bankBalance -= $deposit;
            break;

        case "bet":
            $bet = (int)readline("enter your wager. from 10 to 10'000. increments by 10> ");
            if ($bet % 10 != 0 || $bet > 10000 || $bet === 0) {
                echo "\n$bet is invalid. bet has been set to 10\n";
                $bet = 10;
            }

            break;
        case"withdraw":
            $withdraw = (int)readline("enter how much credits to withdraw> ");
            if ($withdraw % 5 != 0 || $withdraw > $totalCredits) {
                echo "\n $withdraw invalid amount. withdraw with increments in 10\n";
                break;
            }
            $bankBalance += $withdraw / 100;
            $totalCredits -= $withdraw;
            break;

        case "":
            if ($bet > $totalCredits) {
                echo "\nenter 'deposit' to deposit more money\n";
                break;
            }
            $totalCredits -= $bet;

            //table creation
            for ($i = 0; $i < 3; $i++) {
                for ($j = 0; $j < 4; $j++) {
                    $temp = $elements[array_rand($elements)];
                    //check for stars in current column so that there can only be 1 per column
                    for ($k = 0; $k < count($table); $k++) {
                        while ($table[$k][$j] === $S && $temp === $S) {
                            $temp = $elements[array_rand($elements)];
                        }
                    }
                    $table[$i][$j] = $temp;
                    //table print
                    echo "[" . $table[$i][$j]->symbolDisplay . "]";
                }
                echo PHP_EOL;
            }
            echo "----------------------\n";
            $payOutForSpin = 0;

            //checking each defined line for symbols in row
            foreach ($winLines as $i => $line) {
                $payOutForLine = 0;
                $symbolAmount = 1;
                $firstSymbol = $table[$line[0][0]][$line[0][1]];//first symbol from each $winLines
                //print first element of each LINE
                echo "line $i " . $table[$line[0][0]][$line[0][1]]->symbolDisplay . " ";

                for ($column = 1; $column < 4; $column++) {
                    //check if next element is same as first element in that line and if line starts as a star
                    if ($table[$line[$column][0]][$line[$column][1]] === $firstSymbol && $firstSymbol != $S) {
                        $symbolAmount++;
                    } else {
                        break;
                    }
                    //print every same element in line
                    echo $table[$line[$column][0]][$line[$column][1]]->symbolDisplay . " ";
                }
                //check for amount of elements in line and calculate payout for that line
                if ($symbolAmount >= $firstSymbol->minimumAmount) {
                    if ($symbolAmount === 2) {
                        echo " x$firstSymbol->x2 ";
                        $payOutForLine = $firstSymbol->x2 * $bet;
                    } elseif ($symbolAmount === 3) {
                        echo " x$firstSymbol->x3 ";
                        $payOutForLine = $firstSymbol->x3 * $bet;
                    } else {
                        echo " x$firstSymbol->x4 ";
                        $payOutForLine = $firstSymbol->x4 * $bet;
                    }
                    echo "payout for line: $payOutForLine\n";
                    $payOutForSpin += $payOutForLine;
                } else {
                    echo "*" . PHP_EOL;
                }
            }
            //check star amount in table
            $starCount = 0;
            $starWin = 0;
            for ($i = 0; $i < 3; $i++) {
                for ($j = 0; $j < 4; $j++) {
                    if ($table[$i][$j] === $S) {
                        $starCount++;
                    }
                }
            }
            //star symbol payout
            if ($starCount === 2) {
                $starWin = $bet * $S->x2;
            } elseif ($starCount === 3) {
                $starWin = $bet * $S->x3;
            } elseif ($starCount === 4) {
                $starWin = $bet * $S->x4;
            }
            echo "🌟 x$starCount: $starWin\n";
            echo "you won $payOutForSpin\n";
            $totalCredits += $payOutForSpin + $starWin;
    }
}
echo "\nyou are left with $$bankBalance and $" . $totalCredits / 100 . " in credits";
