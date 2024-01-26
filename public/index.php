<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Router;
use App\Controller\HomeController;
use App\Controller\ArticleController;
use Dotenv\Dotenv;

// Load .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Routing
$router = new Router();

$router->addRoute('GET', '/', function(){
    $homeController = new HomeController();
    $homeController->render();
});

$router->addRoute('GET', '/article/new', function(){
    $articleController = new ArticleController();
    $articleController->render();
});

$router->addRoute('POST', '/article/new', function(){
    $articleController = new ArticleController();
    $articleController->create();
});

// Request management
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->handleRequest($requestMethod, $requestPath);