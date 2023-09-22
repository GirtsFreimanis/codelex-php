<?php
$choice = 1;

while ($choice != 4) {
    echo "Geometry Calculator\n";
    echo "1. Calculate the Area of a Circle\n";
    echo "2. Calculate the Area of a Rectangle\n";
    echo "3. Calculate the Area of a Triangle\n";
    echo "4. Quit\n";

    $choice = (int)readline("Enter your choice (1-4)> ");
    switch ($choice) {
        //circle area
        case 1:
            $circleRadius = readline("enter circle radius> ");
            if ($circleRadius < 0) {
                echo "\nenter a positive value!\n";
                break;
            }
            echo "circle area: " . pi() * $circleRadius * 2;
            break;
        //rectangle area
        case 2:
            $rectangleLength = readline("enter rectangle length> ");
            $rectangleWidth = readline("enter rectangle width>  ");
            if ($rectangleWidth < 0 || $rectangleLength < 0) {
                echo "\nenter a positive value!\n";
                break;
            }
            echo "rectangle area: " . $rectangleWidth * $rectangleLength;
            break;
        //triangle area
        case 3:
            $triangleBase = readline("enter triangle base length>  ");
            $triangleHeight = readline("enter triangle height> ");
            if ($triangleHeight < 0 || $triangleBase < 0) {
                echo "\nenter a positive value!\n";
                break;
            }
            echo "triangle area: " . $triangleBase * $triangleHeight * 0.5;
            break;
        //exit and invalid value entered
        case 4:
            exit;
        default:
            echo "\nenter a valid value!";
    }
    echo PHP_EOL . PHP_EOL;
}

