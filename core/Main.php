<?php

namespace main\core;

class Main 
{
    public Request $request;
    public Router $router;
    public static $main;
    public static string $rootPath;
    public View $view;
    public Response $response;
    // public ?Controller $controller = null;
    


    public function __construct(array $conf)
    {
        self::$rootPath = $conf['rootPath'];
        self::$main = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View($this->request);
       
        
    }

    public function run()
    {
        try {
            $this->router->resolve();
            
        } catch (\Exception $e) {
            $this->response->setStatusCode($e->getCode());
            
            $this->view->renderView([
                'code'=>$e->getCode(),
                'message'=> $e->getMessage(),
            ], 'error');
        }
        
    }


    


}