<?php

class Application
{
    private Collection $collection;

    function run(): void
    {
        $this->initialize();

        while (true) {
            $this->collection->printSeasons();
            $season = readline("choose a season> ");
            if (!isset($this->collection->episodes[$season])) {
                echo "season not found!\n";
                continue;
            }
            $this->collection->printEpisodesFromSeason($season);
            $episodeId = (int)readline("pick id> ");
            foreach ($this->collection->episodes[$season] as $episode) {
                if ($episode->id === $episodeId) {
                    $rating = (int)readline("rate from 1-10> ");
                    if ($rating < 1 || $rating > 10) {
                        continue;
                    }
                    $episode->addRating($rating);
                }
            }
        }
    }

    public function initialize()
    {
        $this->collection = new Collection();
        $i = 1;
        while (true) {
            if (@file_get_contents('https://rickandmortyapi.com/api/episode?page=' . $i)) {
                $data = json_decode(file_get_contents('https://rickandmortyapi.com/api/episode?page=' . $i));

                foreach ($data->results as $episode) {
                    $name = $episode->name;
                    $season = substr($episode->episode, 0, 3);
                    $id = $episode->id;
                    $episode = new Episode($name, $season, $id);

                    $this->collection->addEpisode($episode);
                }
            } else {
                break;
            }
            $i++;
        }
    }
}

class Episode
{
    public string $name;
    public string $season;
    public int $id;

    public function __construct(string $name, string $season, $id)
    {
        $this->name = $name;
        $this->season = $season;
        $this->id = $id;
    }

    public function getRating(): float
    {
        if (!file_exists("$this->id.txt")) {
            return 0;
        }
        $file = file_get_contents("$this->id.txt");
        $ratings = explode(";", $file);
        return number_format(array_sum($ratings) / (count($ratings) - 1), 2);
    }

    public function addRating(int $rating): void
    {
        $file = fopen("$this->id.txt", "a");
        fwrite($file, "$rating;");
    }
}

class Collection
{
    public array $episodes = [];

    public function addEpisode(Episode $episode)
    {
        $season = $episode->season;
        if (!isset($this->episodes[$season])) {
            $this->episodes[$season] = [];
        }
        $this->episodes[$season][] = $episode;
    }

    public function printSeasons()
    {
        foreach ($this->episodes as $key => $season) {
            echo "$key ";
        }
    }

    public function printEpisodesFromSeason(string $season)
    {
        if (isset($this->episodes[$season])) {
            foreach ($this->episodes[$season] as $i => $episode) {
                /** @var Episode $episode */
                echo "id: " . ($episode->id < 10 ? " " . $episode->id : $episode->id);
                echo " | rating: {$episode->getRating()}";
                echo " | $episode->name\n";
            }
        }
    }
}

$app = new Application();
$app->run();


