<?php

$firstWord = readline("enter first word> ");
$secondWord = readline("enter second word> ");
$lineLength = 30;
$dotAmount = $lineLength - strlen($firstWord) - strlen($secondWord);
echo $firstWord . str_repeat(".", $dotAmount) . $secondWord;
