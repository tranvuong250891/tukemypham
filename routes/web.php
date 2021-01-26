<?php

use main\controllers\HomeController;
use main\controllers\AuthController;
use main\controllers\TestController;
use main\core\Router;

//HOME
Router::get('/home', [HomeController::class, 'index' ]);
Router::get('/', [HomeController::class, 'index' ]);

//LOGIN
Router::get('/login', [AuthController::class, 'login']);
Router::post('/login', [AuthController::class, 'login']);

//Register
Router::get('/register', [AuthController::class, 'register']);
Router::get('/register', [AuthController::class, 'register']);


//PRODUCT

// TEST
Router::get('/test', [TestController::class, 'index' ]);

