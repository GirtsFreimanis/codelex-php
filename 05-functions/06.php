<?php
//function doubles the given int, saves it in the original array
function doubleInteger(int &$number):int{
    return $number*=2;
}

$arr=[3 , 2.5 , 9 , "10" , 51];

for($i=0;$i<count($arr);$i++){
    if(is_int($arr[$i])){
        echo doubleInteger($arr[$i]).PHP_EOL;
    }
}