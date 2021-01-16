<?php

use main\core\Main;

$rootPath =  dirname( __DIR__);

include_once $rootPath . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable($rootPath);
$dotenv->load();


$conf = [
    'rootPath' => $rootPath,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'pass' => $_ENV['DB_PASS'],
    ],
];

new Main($conf);


Main::$main->run();

