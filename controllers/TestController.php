<?php

namespace main\controllers;

use main\core\Controller;
use main\core\Main;
use main\core\middlewares\AuthMiddleware;
use main\core\Request;
use main\core\Response;
use main\core\Test;
use main\models\OrderModel;

class TestController extends Controller
{
    public function __construct()
    {
        // $auth = new AuthMiddleware(['index']);
        // $auth->adminDashboard();

    }

    public function index()
    {
    

    }

    public function update()
    {

    }

    public function store()
    {
        
    }

    public function insert()
    {
        
    }

    public function destroy()
    {
        
        session_destroy();
        
    }

    public function test()
    {

    }
}