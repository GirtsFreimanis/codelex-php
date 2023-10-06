<?php

class FuelGauge
{
    private int $fuelAmount;
    private int $maxFuelAmount;

    public function __construct(int $fuelAmount, int $maxFuelAmount)
    {
        $this->fuelAmount = $fuelAmount;
        $this->maxFuelAmount = $maxFuelAmount;
    }

    public function getFuelAmount(): int
    {
        return $this->fuelAmount;
    }

    public function addFuel(): void
    {
        if ($this->fuelAmount < $this->maxFuelAmount) {
            $this->fuelAmount += 1;
        }
    }

    public function subtractFuel(): void
    {
        $this->fuelAmount -= 1;
    }
}


class Odometer
{
    public int $mileage;

    public $fuelGauge;

    public function __construct(int $mileage, int $fuelAmount, $maxFuelAmount)
    {
        $this->mileage = $mileage;
        $this->fuelGauge = new FuelGauge($fuelAmount, $maxFuelAmount);
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function addMileage(): void
    {
        if ($this->mileage < 999999) {
            $this->mileage += 1;
            return;
        }
        $this->mileage = 0;
    }

    public function subtractFuel(): void
    {
        $this->fuelGauge->subtractFuel();
    }
}

$odometer = new Odometer(999940, 30, 70);

$travelDistance = 207;
$traveled = 0;

for ($i = 0; $i < $travelDistance; $i++) {
    $traveled++;
    echo "odometer: " . $odometer->getMileage() . "Km | ";
    echo "traveled: $traveled Km | ";
    echo "fuel: " . $odometer->fuelGauge->getFuelAmount() . " L | ";

    usleep(50000);

    $odometer->addMileage();
    if ($traveled % 10 === 0) {
        $odometer->subtractFuel();
    }
    if ($traveled % 35 === 0 && $traveled != 0) {
        $litersToAdd = (int)readline("how many liters to add> ");
        for ($j = 0; $j < $litersToAdd; $j++) {
            $odometer->fuelGauge->addFuel();
        }
    }

    echo PHP_EOL;
}