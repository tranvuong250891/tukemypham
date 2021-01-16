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
       $this->helper('css');

    }

    public function index()
    {
        $this->render([], 'home');
    }

    public function update()
    {

    }

    public function store()
    {

    }

    public function ok()
    {
        return "ok";
    }

}