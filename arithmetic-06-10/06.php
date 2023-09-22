<?php

for ($i = 1; $i < 110; $i++) {
    $divides = false;

    if ($i % 3 === 0) {
        echo "Coza";
        $divides = true;
    }
    if ($i % 5 === 0) {
        echo "Loza";
        $divides = true;
    }
    if ($i % 7 === 0) {
        echo "Woza";
        $divides = true;
    }
    if (!$divides) echo $i;
    echo " ";
    if ($i % 11 === 0) echo PHP_EOL;
}