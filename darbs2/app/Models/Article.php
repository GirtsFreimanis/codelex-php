<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;

class Article
{
    private string $title;
    private Carbon $date;
    private string $description;

    public function __construct(
        string $title,
        Carbon $date,
        string $description
    )
    {
        $this->title = $title;
        $this->date = $date;
        $this->description = $description;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDate(): Carbon
    {
        return $this->date;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}