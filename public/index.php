<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Router;
use App\Controller\HomeController;
use App\Controller\ArticleController;


$router = new Router();

$router->addRoute('GET', '/', function(){
    $homeController = new HomeController();
    $homeController->render();
});

$router->addRoute('GET', '/article/new', function(){
    $articleController = new ArticleController();
    $articleController->render();
});


// Manejar la solicitud actual
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// echo "Request Method: $requestMethod <br>";
// echo "Request Path: $requestPath <br>";

$router->handleRequest($requestMethod, $requestPath);