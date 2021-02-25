<?php

use main\controllers\HomeController;
use main\controllers\AuthController;
use main\controllers\TestController;
use main\controllers\OrderController;

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

//USER
Router::get('/user', [AuthController::class, 'user']);

//PRODUCT

// TEST
Router::get('/ok', [TestController::class, 'index' ]);
Router::get('/destroy', [TestController::class, 'destroy' ]);

//ORDER
Router::get('/order', [OrderController::class, 'index' ]);
Router::post('/order', [OrderController::class, 'index' ]);

Router::post('/api/order', [OrderController::class, 'insert' ]);


