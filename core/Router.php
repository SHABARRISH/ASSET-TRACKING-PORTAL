<?php

class Router
{
    private array $routes = [];

    public function get(string $uri, callable $callback): void
    {
        $this->routes['GET'][$uri] = $callback;
    }

    public function post(string $uri, callable $callback): void
   {
    $this->routes['POST'][$uri] = $callback;
   }
    public function resolve(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Remove project base path
        $basePath = '/ASSET-TRACKING-PORTAL/public';
        $uri = str_replace($basePath, '', $uri);

        if ($uri === '') {
            $uri = '/';
        }

        if (isset($this->routes[$method][$uri])) {
            call_user_func($this->routes[$method][$uri]);
        } else {
            http_response_code(404);
            echo "<h1 style='text-align:center;margin-top:50px;'>404 - Page Not Found</h1>";
        }
    }
}