<?php

class Point
{
    private int $x;
    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
        return $this;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public static function swapPoints(Point $p1, Point $p2)
    {
        $tempX = $p1->x;
        $tempY = $p1->y;
        $p1->x = $p2->x;
        $p1->y = $p2->y;
        $p2->x = $tempX;
        $p2->y = $tempY;
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

Point::swapPoints($p1, $p2);

echo "(" . $p1->getX() . ", " . $p1->getY() . ")\n";
echo "(" . $p2->getX() . ", " . $p2->getY() . ")";