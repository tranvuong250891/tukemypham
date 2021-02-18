<?php

namespace main\controllers;

use main\core\Controller;
use main\core\Main;

class AuthController extends Controller
{
    public $checkUser = false;

    public function __construct()
    {
        
    }

    public function login()
    {
        
    }

    public function register()
    {
        
    }

    public function user()
    {
        $this->checkUser = Main::$main->session->get('user') ?? false;
        echo \json_encode($this->checkUser);

    }

    

    
}