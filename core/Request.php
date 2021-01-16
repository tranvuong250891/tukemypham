<?php
namespace main\core;

use main\core\request\HandleRequest;

class Request extends HandleRequest
{   

    public function request(): string
    {
        $uri = $_SERVER['REQUEST_URI'];
        if(substr_count($uri,'/') > 3){
            exit();
            die();
        };

        return  $uri ?? '/';
    }

    public function isPost()
    {
        return $this->method() === 'post';
    } 

    public function isGet()
    {
        return $this->method() === 'get';
    }

    public static function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }



}