<?php
namespace main\core;

use main\core\exception\NotFoundException;
use main\core\router\HandleRouter;

class Router extends HandleRouter
{
    protected static array $routes;
    public Request $request;

    protected function routes() :array
    {
        return  self::$routes;
    }

    public function __construct(Request $request)
    {
        $rootPath = Main::$rootPath;
        foreach(scandir($rootPath. '/routes') as $file ){
            if($file === '.' || $file === '..' ){
                continue;
            }
            include_once($rootPath.'/routes/'. $file);
        };
        $this->request = $request;

        $this->path = $request->getPath();
        
    }



    protected function request(): object
    {
       return $this->request;
    }

    public static function get(string $path, $callback)
    {   
       self::$routes['get'][$path] = $callback;
    }

    public static function post(string $path, $callback)
    {
       self::$routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        if($this->setController() === false){
            throw new NotFoundException();
        }

        call_user_func($this->setController());

    }

    public function test()
    {
        echo "test router";
    }



}