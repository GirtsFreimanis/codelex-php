<?php

function checkAge(stdClass $person):bool{
    return $person->age>=18;
}
//person object creation
$person = new stdClass();
$person->name="John";
$person->surname="Doe";
$person->age=17;

echo "$person->name has". (checkAge($person)?" ":" not yet ") . "reached 18 years of age.";
