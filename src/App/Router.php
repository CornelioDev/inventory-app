<?php

declare(strict_types=1);

namespace App;

class Router
{
    private array $routes = [];

    public function addRoute(string $method, string $path, callable $handler): void
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler,
        ];
    }

    public function handleRequest(string $method, string $path): void
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $path) {
                $handler = $route['handler'];
                $handler();
                return;
            }
        }

        http_response_code(404);
        echo '404 Not Found: ' . $path;
    }
}
