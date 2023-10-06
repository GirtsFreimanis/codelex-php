<?php

class Movie
{
    public string $title;
    private string $studio;
    private string $rating;

    public function __construct(string $title, string $studio, string $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public static function GetPG(array $movies): array
    {
        $moviesPG = [];
        foreach ($movies as $movie) {
            if ($movie->rating === "PG") {
                $moviesPG[] = $movie;
            }
        }
        return $moviesPG;
    }
}

$movies = [
    new Movie("Casino Royale", "Eon Productions", "PG13"),
    new Movie("Glass", "Buena Vista International", "PG13"),
    new Movie("Spider-Man: Into the Spider-Verse", "Columbia Pictures", "PG"),
];

$moviesPG = Movie::GetPg($movies);
foreach ($moviesPG as $movie) {
    echo $movie->title . PHP_EOL;
}