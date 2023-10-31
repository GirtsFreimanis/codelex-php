<?php

declare(strict_types=1);

use App\Views\Response;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once "vendor/autoload.php";


$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/articles', ["App\Controllers\ArticleController", "index"]);
    $r->addRoute('GET', '/articles/{id:\d+}', ["App\Controllers\ArticleController", "show"]);
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        //echo "<pre>";

        [$controller, $method] = $routeInfo[1];

        $response = (new $controller)->{$method}($vars);

        $loader = new FilesystemLoader('C:\Users\lietotajs\PhpstormProjects\codelex-php\darbs2\app\Templates');
        $twig = new Environment($loader);

        /** @var Response $response */
        if ($response->getViewName() === "articles.index") {
            $articles = $response->getData()["articles"];
            echo $twig->render('index.twig', ["articles" => $articles]);
        }

        if ($response->getViewName() === "articles.show") {
            $article = $response->getData()["article"];
            //var_dump($article);
            echo $twig->render('show.twig', ["article" => $article]);
        }
}
