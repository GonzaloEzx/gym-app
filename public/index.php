<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;

$router = new Router();

$router->add('/', function() {
    return 'Welcome to the Gym App!';
});

$router->add('/login', function() {
    include __DIR__ . '/../app/views/auth/login.php';
});

$router->dispatch();