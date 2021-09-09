<?php

require_once __DIR__.'/../vendor/autoload.php';

use myApp\Router;
use myApp\controllers\ProductController;

$router = new Router();

$router->get('/', [ProductController::class, 'index']);
$router->get('/product', [ProductController::class, 'index']);
$router->get('/product/create', [ProductController::class, 'create']);
$router->post('/product/create', [ProductController::class, 'create']);
$router->get('/product/update', [ProductController::class, 'update']);
$router->post('/product/update', [ProductController::class, 'update']);
$router->post('/product/delete', [ProductController::class, 'delete']);

$router->resolve();