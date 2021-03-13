<?php

use main\controllers\api\CommentApi;
use main\controllers\api\imgApi;
use main\controllers\ApiUserController;
use main\core\Router;
use main\controllers\ProductController;
use main\controllers\CartController;
use main\controllers\HomeController;
use main\controllers\NewsController;
use main\core\upload;

Router::get('/editproduct', [HomeController::class, 'test']);


//Login
Router::post('/apiuser/login', [ApiUserController::class, 'login']);

//REGISTER
Router::post('/apiuser/register', [ApiUserController::class, 'register']);
Router::get('/destroy', [ApiUserController::class, 'destroy']);


//PRODUCT
Router::get('/apiproduct', [ProductController::class, 'index']);
Router::get('/detail', [ProductController::class, 'show']);
Router::post('/insertproduct', [ProductController::class, 'insert']);
Router::get('/insertproduct', [ProductController::class, 'insert']);
Router::get('/deleteproduct', [ProductController::class, 'delete']);
Router::post('/updateproduct', [ProductController::class, 'update']);
Router::get('/editproduct', [ProductController::class, 'show']);

//NEWS
Router::get('/news', [NewsController::class, 'index']);
Router::get('/dashboardnews', [NewsController::class, 'show']);
// Router::get('/gettypenews', [NewsController::class, 'test']);
Router::get('/apinews', [NewsController::class, 'api']);
Router::post('/apinews', [NewsController::class, 'api']);
Router::post('/insertnews', [NewsController::class, 'insert']);
Router::post('/deletenews', [NewsController::class, 'delete']);




//CART 
Router::get('/cart', [CartController::class, 'index']);
Router::post('/cart/update', [CartController::class, 'update']);
Router::get('/cart/update', [CartController::class, 'update']);

Router::get('/cart/store', [CartController::class, 'store']);
Router::post('/cart/store', [CartController::class, 'store']);

Router::get('/cart/destroy', [CartController::class, 'destroy']);
Router::get('/cart/show', [CartController::class, 'show']);

//COMMENT
Router::post('/comment', [CommentApi::class, 'index']);

Router::get('/comment/show', [CommentApi::class, 'show']);


//IMG
Router::get('/api/img', [imgApi::class, 'index']);

//UPLOAD
Router::post('/upload', [upload::class, 'upload']);
Router::get('/upload', [upload::class, 'upload']);
Router::get('/upload/show', [upload::class, 'show']);






