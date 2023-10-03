<?php

class Piglet
{
    static public function game()
    {
        echo "Welcome to piglet!\n";
        $die = rand(1, 6);
        $points = 0;
        
        while ($die != 1) {
            $choice = "o";
            echo "you rolled a $die\n";
            $points += $die;

            while ($choice != "y" && $choice != "n") {
                $choice = readline("Roll again? (y/n)");
            }
            if ($choice === "n") {
                echo "you got $points points";
                exit;
            }
            $die = rand(1, 6);
        }
        echo "you rolled a $die!\n";
        echo "you got 0 points";
    }
}

Piglet::game();