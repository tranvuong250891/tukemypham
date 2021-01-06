<?php

namespace main\core\router;

use main\core\Controller;
use main\core\Request;
use main\core\Test;
use main\core\exception\NotFoundException;

abstract class HandleRouter
{

    protected string $controller;
    protected string $method = 'index';
    protected array $params = [] ;
    protected string $path = '' ;

    abstract protected function routes() : array;
    abstract protected function request() : object;

    


    public function setController()
    {
        
        $callback = $this->routes()[$this->request->method()][$this->path] ?? false;
       
        return $callback;

    }






}