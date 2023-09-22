<?php

$Sam=new stdClass();
$Sam->name="Sam";
$Sam->surname="Sulek";
$Sam->age=21;
$Sam->birthday="07.02.2002";

$Mike=new stdClass();
$Mike->name="Mike";
$Mike->surname="Mentzer";
$Mike->age=71;
$Mike->birthday="10.06.1951";

$Kevin=new stdClass();
$Kevin->name="Kevin";
$Kevin->surname="Levrone";
$Kevin->age=59;
$Kevin->birthday="16.06.1964";

$persons=[$Sam,$Mike,$Kevin];

for($i=0;$i<count($persons);$i++){
    $person=$persons[$i];
    echo "$person->name $person->surname\n";
    echo "Age: $person->age\n";
    echo "Birthday: $person->birthday\n\n";
}