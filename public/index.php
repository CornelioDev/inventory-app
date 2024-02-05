<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Router;
use App\Controller\HomeController;
use App\Controller\ArticleController;
use App\Controller\WarehouseController;
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

$router->addRoute('GET', '/articles', function(){
    $articleController = new ArticleController();
    $articleController->showAll();
});

$router->addRoute('GET', '/article/new', function(){
    $articleController = new ArticleController();
    $articleController->newArticleForm();
});

$router->addRoute('POST', '/article/new', function(){
    $articleController = new ArticleController();
    $articleController->create();
});

$router->addRoute('GET', '/article/{id}', function($matches){
    $id = $matches['id'];
    $articleController = new ArticleController();
    $articleController->show($id);
});

$router->addRoute('GET', '/article/{id}/edit', function($matches){
    $id = $matches['id'];
    $articleController = new ArticleController();
    $articleController->edit($id);
});

$router->addRoute('POST', '/article/{id}/edit', function($matches){
    $id = $matches['id'];
    $articleController = new ArticleController();
    $articleController->update($id);
});

$router->addRoute('GET', '/article/{id}/delete', function($matches){
    $id = $matches['id'];
    $articleController = new ArticleController();
    $articleController->delete($id);
});

// WAREHOUSES ROUTES

$router->addRoute('GET', '/warehouse/new', function(){
    $warehouseController = new WarehouseController();
    $warehouseController->create();
});

$router->addRoute('POST', '/warehouse/new', function(){
    $warehouseController = new WarehouseController();
    $warehouseController->store();
});

$router->addRoute('GET', '/warehouses', function(){
    $warehouseController = new WarehouseController();
    $warehouseController->showAll();
});

$router->addRoute('GET', '/warehouse/{id}', function($matches){
    $id = $matches['id'];
    $warehouseController = new WarehouseController();
    $warehouseController->show($id);
});

$router->addRoute('GET', '/warehouse/{id}/edit', function($matches){
    $id = $matches['id'];
    $warehouseController = new WarehouseController();
    $warehouseController->edit($id);
});

$router->addRoute('POST', '/warehouse/{id}/edit', function($matches){
    $id = $matches['id'];
    $warehouseController = new WarehouseController();
    $warehouseController->update($id);
});

$router->addRoute('GET', '/warehouse/{id}/delete', function($matches){
    $id = $matches['id'];
    $warehouseController = new WarehouseController();
    $warehouseController->delete($id);
});

// Request management
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->handleRequest($requestMethod, $requestPath);