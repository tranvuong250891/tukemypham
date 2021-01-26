<?php
namespace main\core;

use main\core\exception\NotFoundException;
use main\core\router\HandleRouter;

class Router extends HandleRouter
{
    public static array $routes = [];
    public Request $request;
    public Response $response;
    public static string $uri;
    
    protected function routes() :array
    {
        return  self::$routes;
    }

    public function __construct(Request $request, Response $response)
    {
        $this->response = $response;
        $rootPath = Main::$rootPath;
       
        foreach(scandir($rootPath. '/routes') as $file ){
            if($file === '.' || $file === '..' ){
                continue;
            }
            include_once($rootPath.'/routes/'. $file);
        };
        $this->request = $request;
        parent::$path = $request->getPath();
    }

    public function request() :object
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

    public static function addRoutes(string $path, $callback)
    {
        self::$routes['style'][$path] = $callback;
    }
    
    public function resolve()
    { 
        $callback = $this->setController();
        $callback = $callback[$this->request->method()][parent::$path] ?? false;
        $style = $this->setController()['style'][parent::$path];

        if(is_string($style)){
            echo $style;
            return; 
        }

        if($callback === false){
            throw new NotFoundException();
        }
        
        if(is_array($callback)){
            // echo $callback[0]; 
            $controller = new $callback[0]($this->request, $this->response);
            return $controller->{$callback[1]}($this->request, $this->response);
        }

    }

}