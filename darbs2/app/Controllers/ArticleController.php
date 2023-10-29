<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Article;
use App\Views\Response;

class ArticleController
{
    public function index(): Response
    {
        return new Response("articles.index", [
            "articles" => [
                new Article("News 1", "something happened"),
                new Article("News 2", "something else happened"),
                new Article("News 3", "something happened somewhere else")
            ]
        ]);
    }

    public function show(array $vars): Response
    {
        $article = $this->index()->getData()["articles"][$vars["id"]];
        if (isset($article))
            return new Response(
                "articles.show", [
                "article" => new Article($article->getTitle(), $article->getDescription())
            ]);
        else {
            return new Response(
                "articles.show", [
                "article" => new Article("Article not found!", "")
            ]);
        }
    }
}
