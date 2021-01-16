<?php

use main\controllers\HomeController;
use main\core\Router;

//HOME
Router::get('/home', [HomeController::class, 'index' ]);

