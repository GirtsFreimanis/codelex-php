<?php

//function to determine which guns can the person purchase
function checkGunPurchase(stdClass $person, stdClass $gun): bool
{
    if (in_array($gun->license, $person->licenses) && $gun->price < $person->money) {
        return true;
    }
    return false;
}

//creation of person
$person = new stdClass();
$person->name = "John";
$person->money = 1500;
$person->licenses = ["H", "S"];

//creation of guns and gun array
function createGun(string $name, string $license, float $price): stdClass
{
    $gun = new stdClass();
    $gun->name = $name;
    $gun->license = $license;
    $gun->price = $price;
    return $gun;
}

$guns = [
    createGun("Glock 17", "H", 880.00),
    createGun("COLT M4", "C", 2204.99),
    createGun("WINCHESTER SX4", "S", 880.00),
    createGun("Remington 700", "L", 699.00),
];
//calling function to check which guns can person purchase
foreach ($guns as $gun) {
    if (checkGunPurchase($person, $gun)) {
        echo "$person->name is able to purchase $gun->name for $gun->price\n";
    } else {
        echo "$person->name can't purchase $gun->name\n";
    }
}
