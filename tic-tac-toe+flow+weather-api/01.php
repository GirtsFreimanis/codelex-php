<?php
$numberAmount = 3;
$numbers = [];
for ($i = 0; $i < $numberAmount; $i++) {
    $numbers[] = (int)readline("enter " . ($i + 1) . ". number> ");
}
echo "highest number: " . max($numbers);