<?php

namespace main\controllers;

use main\core\Controller;
use main\core\Main;
use main\core\Request;
use main\core\Response;
use main\core\Test;

class HomeController extends Controller
{
    public function __construct()
    {
        

    }

    public function index()
    {
        $this->render([
            'name'=>'Vuong',
            'title'=> 'tilte',
        ], 'product.php');
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

    public function deytroy()
    {

    }

    public function test()
    {
        
        $this->render([
            'name'=>'Vuong',
            'title'=> 'tilte',
        ], '/dashboard/content.html');
    }
}