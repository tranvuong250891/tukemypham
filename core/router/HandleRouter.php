<?php

namespace main\core\router;

use main\core\Controller;
use main\core\Request;
use main\core\Test;
use main\core\exception\NotFoundException;

abstract class HandleRouter extends AuthRouter
{

    
    protected string $method = 'index';
    protected array $params = [] ;
    protected static string $path = '' ;
    protected static $callback = '';
    abstract protected function routes() : array;
    abstract public function request() :object;

    public function getPath() :string
    {
       return $this->request()->method();
    }
    

    
    public function setController()
    {
        $router = $this->routes();
     
        return  $router;

    }







}