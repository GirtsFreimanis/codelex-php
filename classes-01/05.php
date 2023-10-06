<?php

class Date
{
    private int $day;
    private int $month;
    private int $year;

    public function __construct(int $day, int $month, int $year)
    {
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
    }

    public function setDay($day)
    {
        $this->day = $day;
    }

    public function setMonth($month)
    {
        $this->month = $month;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }

    public function getDay(): string
    {
        return $this->day < 10 ? "0" . $this->day : $this->day;
    }

    public function getMonth(): string
    {
        return $this->month < 10 ? "0" . $this->month : $this->month;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public static function DisplayDate(Date $date): string
    {
        return $date->getDay() . "/" . $date->getMonth() . "/" . $date->getYear();
    }
}

$date = new Date(4, 9, 2022);
echo Date::DisplayDate($date);

$date->setDay(5);
$date->setMonth(10);
$date->setYear(2023);
echo PHP_EOL;
echo Date::DisplayDate($date);
