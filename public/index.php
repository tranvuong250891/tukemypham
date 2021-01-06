<?php

use main\core\Main;

$rootPath =  dirname( __DIR__);

include_once $rootPath . '/vendor/autoload.php';

$conf = [
    'rootPath' => $rootPath,
];

new Main($conf);

Main::$main->run();