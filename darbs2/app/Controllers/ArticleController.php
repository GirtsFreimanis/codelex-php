<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Article;
use App\Views\Response;
use Carbon\Carbon;

class ArticleController
{
    public function index(): Response
    {
        return new Response("articles.index", [
            "articles" => [
                new Article(
                    "Breaking news",
                    Carbon::createFromFormat('Y-m-d H:i:s', '2023-01-14 01:24:05'),
                    "something happened"
                ),
                new Article(
                    "Astonishing news",
                    Carbon::createFromFormat('Y-m-d H:i:s', '2023-06-07 12:02:59'),
                    "something else happened"
                ),
                new Article(
                    "Regular news",
                    Carbon::createFromFormat('Y-m-d H:i:s', '2023-08-09 17:55:11'),
                    "something happened somewhere else"
                )
            ]
        ]);
    }

    public function show(array $vars): Response
    {
        $article = $this->index()->getData()["articles"][$vars["id"]];
        if (isset($article))
            return new Response(
                "articles.show", [
                "article" => new Article($article->getTitle(), $article->getDate(), $article->getDescription())
            ]);
        else {
            return new Response(
                "articles.show", [
                "article" => new Article("Article not found!", Carbon::now(), "")
            ]);
        }
    }
}
