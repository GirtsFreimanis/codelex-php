<?php

$number = (int)readline("enter day from 0 to 6> ");
switch ($number) {
    case 0:
        echo "It is Monday";
        break;
    case 1:
        echo "It is Tuesday";
        break;
    case 2:
        echo "It is Wednesday";
        break;
    case 3:
        echo "It is Thursday";
        break;
    case 4:
        echo "It is Friday";
        break;
    case 5:
        echo "It is Saturday";
        break;
    case 6:
        echo "It is Sunday";
        break;
    default:
        echo "Not a valid day";
        break;
}