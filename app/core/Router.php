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
                if (is_callable($callback)) {
                    echo call_user_func($callback);
                } elseif (is_array($callback) && count($callback) == 2) {
                    [$controller, $method] = $callback;
                    if (class_exists($controller)) {
                        $controllerInstance = new $controller();
                        if (method_exists($controllerInstance, $method)) {
                            echo call_user_func([$controllerInstance, $method]);
                        } else {
                            echo "Method $method not found in controller $controller";
                        }
                    } else {
                        echo "Controller class $controller not found";
                    }
                }
                return;
            }
        }
        http_response_code(404);
        echo 'Page not found';
    }
}

