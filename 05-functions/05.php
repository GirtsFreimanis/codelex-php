<?php
//function returns true if weight is above 10
function shippingWeight(float $weight):bool
{
    return $weight>10;
}

$fruits=[
    ["name"=>"apples","weight"=>5.11],
    ["name"=>"strawberries","weight"=>15.52],
    ["name"=>"plums","weight"=>7.12],
    ["name"=>"cherries","weight"=>9.74],
    ["name"=>"bananas","weight"=>12.88]
];

//second array for storing shipping costs, using shippingWeight function to check fruit weight
$shippingCosts=[];
foreach($fruits as $fruit){
    $shippingCosts[]=shippingWeight($fruit["weight"])?2:1;
}

foreach($fruits as $i => $fruit){
    echo $fruit["name"] .": ". $fruit["weight"]." kg, shipping: EUR ".$shippingCosts[$i].PHP_EOL;
}