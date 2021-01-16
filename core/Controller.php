<?php

namespace main\core;

class Controller 
{
    protected array $middlewares = [];
   
    public string $action = '';
    protected static string $path;

    public function getPath()
    {
        self::$path = Main::$main->request->getPath();
    }

    public function render($params = [], $content, $layout = false)
    {
        
        return Main::$main->view->renderView($params, $content, $layout);
       
    }

    public function helper( string $extention)
    {
       
    }





}