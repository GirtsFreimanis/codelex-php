<?php
$episodes = json_decode(file_get_contents('https://rickandmortyapi.com/api/episode'));

foreach ($episodes->results as $episode) {
    echo $episode->name . PHP_EOL;
}