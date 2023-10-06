<?php

$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;

class EnergyDrinkQuery
{
    private int $surveyed;
    private float $purchased_energy_drinks;
    private float $prefer_citrus_drinks;

    public function __construct(int $surveyed, float $purchased_energy_drinks, float $prefer_citrus_drinks)
    {
        $this->surveyed = $surveyed;
        $this->purchased_energy_drinks = $purchased_energy_drinks;
        $this->prefer_citrus_drinks = $prefer_citrus_drinks;
    }

    public function Calculate_Energy_Drinkers(): int
    {
        return $this->surveyed * $this->purchased_energy_drinks;
    }

    public function Calculate_Prefer_Citrus(): int
    {
        return $this->Calculate_Energy_Drinkers() * $this->prefer_citrus_drinks;
    }
}

$query = new EnergyDrinkQuery($surveyed, $purchased_energy_drinks, $prefer_citrus_drinks);

echo "Total number of people surveyed " . $surveyed . PHP_EOL;
echo "Approximately " . $query->Calculate_Energy_Drinkers() . " bought at least one energy drink" . PHP_EOL;
echo "of those " . $query->Calculate_Prefer_Citrus() . " prefer citrus flavored energy drinks.";
