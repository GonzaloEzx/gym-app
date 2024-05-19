<?php

namespace App\Core;

class Router
{
    private $routes = [];

    public function add($route, $callback)
    {
        $this->routes[$route] = $callback;
    }

    public function dispatch()
    {
        $url = $_SERVER['REQUEST_URI'] ?? '/';
        foreach ($this->routes as $route => $callback) {
            if ($route === $url) {
                echo call_user_func($callback);
                return;
            }
        }
        http_response_code(404);
        echo 'Page not found';
    }
}
