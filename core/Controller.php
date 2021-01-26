<?php

namespace main\core;

class Controller 
{
    protected array $middlewares = [];
   
    public string $action = '';
    protected static string $path;
    public function __construct()
    {
        $this->helper();
      
    }

    public function render($params = [], $content, $layout = false)
    {
        
        Main::$main->view->renderView($params, $content, $layout);
        
       
    }

    public function helper()
    {
      
       Main::$main->view->helper();
    }





}