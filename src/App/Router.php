<?php

declare(strict_types=1);

namespace App;

class Router
{
    private array $routes = [];

    public function addRoute(string $method, string $path, callable $handler): void
    {
        $pattern = '%^' . str_replace(['{', '}'], ['(?<', '>\w+)'], $path) . '$%';
        $this->routes[] = [
            'method' => $method,
            'pattern' => $pattern,
            'handler' => $handler,
        ];
    }

    public function handleRequest(string $method, string $path): void
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === $method 
            && preg_match($route['pattern'], $path, $matches)) 
            {
                $handler = $route['handler'];
                $handler($matches);
                return;
            }
        }

        http_response_code(404);
        echo '404 Not Found: ' . $path;
    }
}
