<?php
//function returns true if age is at least 18
function checkAge(stdClass $person):bool{
    return $person->age>=18;
}
// creating person objects
function createPerson(string $name, string $surname, int $age):stdClass{
    $person=new stdClass();
    $person->name=$name;
    $person->surname=$surname;
    $person->age=$age;

    return $person;
}
$persons=[
    createPerson("John","Doe",22),
    createPerson("Jane","Doe",17),
    createPerson("Amy","Doe",18)
];
//calling checkAge function and printing if person is at least 18
foreach($persons as $person){
        echo "$person->name has". (checkAge($person)?" ":" not yet ") . "reached 18 years of age.\n";
}

