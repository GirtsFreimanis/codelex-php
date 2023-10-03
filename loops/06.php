<?php

class AsciiFigure
{
    const size = 5;

    static public function draw(): void
    {
        $backSlash = substr("\ ", 0, -1);

        $totalWidth = 8 * (self::size - 1);
        for ($i = 0; $i < self::size; $i++) {
            $starAmount = 8 * $i;
            $slashAmount = ($totalWidth - $starAmount) / 2;
            echo str_repeat("/", $slashAmount);
            echo str_repeat("*", $starAmount);
            echo str_repeat($backSlash, $slashAmount);
            echo PHP_EOL;
        }
    }
}

AsciiFigure::draw();