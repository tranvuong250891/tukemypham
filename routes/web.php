<?php

use main\controllers\HomeController;
use main\core\Router;

Router::get('text', 'ok');
Router::get('/home', [ HomeController::class, 'index' ]);
Router::get('/', [ HomeController::class, 'index' ]);