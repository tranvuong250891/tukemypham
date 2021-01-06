<?php

namespace main\core;

class Main 
{
    public Request $request;
    public Router $router;
    public static $main;
    public static string $rootPath;
    


    public function __construct(array $conf)
    {
        self::$rootPath = $conf['rootPath'];
        self::$main = $this;
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        try {

            
            $this->router->resolve();
         
        } catch (\Exception $e) {
            echo $e->getcode();
        }
        
    }

    public function test()
    {
        return "hello test main";
    }

    


}