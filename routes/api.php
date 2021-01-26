<?php

use main\controllers\ApiUserController;
use main\core\Router;
use main\controllers\ProductController;

//Login
Router::post('/apiuser/login', [ApiUserController::class, 'login']);

//REGISTER
Router::post('/apiuser/register', [ApiUserController::class, 'register']);
Router::get('/destroy', [ApiUserController::class, 'destroy']);


//PRODUCT
Router::get('/apiproduct', [ProductController::class, 'index']);



