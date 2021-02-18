<?php
namespace main\core;

use main\core\request\HandleRequest;

class Request extends HandleRequest
{   

    public function request(): string
    {
        $uri = $_SERVER['REQUEST_URI'];
      

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

    public function getBody()
    {
        $body = [];
        if($this->method() === 'get'){
            foreach($_GET as $k => $v){
                $body[$k] = filter_input(INPUT_GET, $k, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }   
        if($this->method() === 'post'){
            if(!$_POST){
                $data =  json_decode(file_get_contents('php://input')) ?? [];
                foreach($data as $key => $value) {
                    $body[$key] = $value;   
                }

            } else {
                foreach($_POST as $k => $v){
                    $body[$k] = filter_input(INPUT_POST, $k, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
            
          
        }   

        return $body;
    }



}