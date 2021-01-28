<?php

namespace main\controllers;

use main\core\Controller;
use main\core\Main;
use main\core\Request;
use main\core\Response;
use main\core\Test;

class TestController extends Controller
{
    public function __construct()
    {
        

    }

    public function index()
    {
        echo "test";
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
        echo "xoa session";
    }

    public function test()
    {

    }
}