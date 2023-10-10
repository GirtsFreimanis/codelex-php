<?php

class Application
{
    private VideoStore $videoStore;

    public function __construct()
    {
        $this->videoStore = new VideoStore();
    }

    function run()
    {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline("input> ");

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->Add_Videos();
                    break;
                case 2:
                    $this->Rent_Video();
                    break;
                case 3:
                    $this->Return_Video();
                    break;
                case 4:
                    $this->List_Inventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..\n";
            }
        }
    }

    private function Add_Videos()
    {
        $amount = (int)readline("how many movies to add?> ");
        for ($i = 0; $i < $amount; $i++) {
            $title = readline("enter movie title> ");
            $this->videoStore->Add_Video($title);
        }
    }

    private function Rent_Video()
    {
        $this->videoStore->Print_Available_Videos();
        $video = readline("Which video to rent> ");
        $this->videoStore->Rent_Video($video);
    }

    private function Return_Video()
    {
        $this->videoStore->Print_Unavailable_Videos();
        $video = readline("Which video to return> ");
        $this->videoStore->Return_Video($video);
    }

    private function List_Inventory()
    {
        $this->videoStore->List_Inventory();
    }
}

class VideoStore
{
    private array $videos;

    public function __construct()
    {
        $this->videos = [];
    }

    public function Add_Video($title)
    {
        $this->videos[] = new Video($title);
    }

    public function Print_Available_Videos()
    {
        foreach ($this->videos as $video) {
            echo $video->Get_Status() === "available" ? $video->Get_Title() . "\n" : "";
        }
    }

    public function Print_Unavailable_Videos()
    {
        foreach ($this->videos as $video) {
            echo $video->status === "unavailable" ? $video->Get_Title() . "\n" : "";
        }
    }

    public function Rent_Video($title)
    {
        /** @var Video $video */
        foreach ($this->videos as $video) {
            if ($video->Get_Title() === $title) {
                $video->Rent_Video();
            }
        }
    }

    public function Return_Video($title)
    {
        /** @var Video $video */
        foreach ($this->videos as $video) {
            if ($video->Get_Title() === $title) {
                $video->Return_Video();
                $rating = (int)readline("rate the video> ");
                if ($rating > 0 && $rating <= 10) {
                    $video->Add_Rating($rating);
                }
            }
        }
    }

    public function List_Inventory()
    {
        /** @var Video $video */
        foreach ($this->videos as $video) {
            echo "title: {$video->Get_Title()} | ";
            echo "rating: {$video->Get_Rating()}/10 | ";
            echo "status: {$video->Get_Status()}\n";
        }
    }
}

class Video
{
    private string $title;
    private float $rating;
    private int $totalReviews;
    public string $status;

    public function __construct(string $title)
    {
        $this->title = $title;
        $this->rating = 0;
        $this->totalReviews = 0;
        $this->status = "available";

        $totalReviews = rand(0, 2);
        for ($i = 0; $i < $totalReviews; $i++) {
            $this->Add_Rating(rand(0, 10));
        }
    }

    public function Get_Title(): string
    {
        return $this->title;
    }

    public function Get_Rating(): float
    {
        return round($this->rating, 2);
    }

    public function Get_Status(): string
    {
        return $this->status;
    }

    public function Rent_Video(): void
    {
        $this->status = "unavailable";
    }

    public function Return_Video(): void
    {
        $this->status = "available";

    }

    public function Add_Rating(int $newRating): void
    {
        if ($this->totalReviews > 0) {
            $this->rating = ($this->rating * $this->totalReviews + $newRating) / ($this->totalReviews + 1);
        } else {
            $this->rating = $newRating;
        }
        $this->totalReviews++;
    }
}

$app = new Application();
$app->run();