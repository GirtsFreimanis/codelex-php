<?php

$weight = (float)readline("enter body weight (kg)> ");
$height = (int)readline("enter height (cm)> ");
$weight *= 2.2;
$height /= 2.54;

$BMI = ($weight * 703) / pow($height, 2);
if ($BMI < 18.5) {
    echo "you are underweight";
} elseif ($BMI > 25) {
    echo "you are overweight";
} else {
    echo "your weight is optimal";
}