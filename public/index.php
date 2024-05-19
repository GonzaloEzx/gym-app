<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Controllers\AuthController;
use App\Controllers\ClientController;
use App\Controllers\DashboardController;

$router = new Router();

$router->add('/', function() {
    return 'Welcome to the Gym App!';
});

$router->add('/login', [AuthController::class, 'login']);
$router->add('/logout', [AuthController::class, 'logout']);

$router->add('/clients', [ClientController::class, 'list']);
$router->add('/clients/add', [ClientController::class, 'add']);
$router->add('/clients/edit', function() {
    $id = $_GET['id'] ?? null;
    if ($id) {
        $controller = new ClientController();
        $controller->edit($id);
    } else {
        echo 'Client ID is required';
    }
});
$router->add('/clients/delete', function() {
    $id = $_GET['id'] ?? null;
    if ($id) {
        $controller = new ClientController();
        $controller->delete($id);
    } else {
        echo 'Client ID is required';
    }
});

$router->add('/dashboard/admin', [DashboardController::class, 'admin']);
$router->add('/dashboard/owner', [DashboardController::class, 'owner']);

$router->dispatch();