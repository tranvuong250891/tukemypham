<?php

namespace main\core\router;

use main\core\Controller;
use main\core\Request;
use main\core\Test;
use main\core\exception\NotFoundException;
use main\core\Main;

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


    public function urlSeo()
    {
        
    }

    
    public function setController()
    {

        $urlSeo = $this->request()->urlSeo;

       

        if($urlSeo){
            $class = $urlSeo->class;
            $router[$this->request()->method()][$this->request()->path] = [ $class, 'detail'];
           
        } else {
            $router = $this->routes();
        }
        
        // Test::show($router);
      
     
        return  $router;

    }







}