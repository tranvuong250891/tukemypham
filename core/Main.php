<?php

namespace main\core;

use main\models\UserModel;

class Main 
{
    public Request $request;
    public Router $router;
    public static $main;
    public static string $rootPath;
    public View $view;
    public Response $response;
    public ?Controller $controller = null;
    public Database $db;
    public Session $session;
    public ?UserModel $user;
    
    


    public function __construct(array $conf)
    {
       
        self::$rootPath = $conf['rootPath'];
        self::$main = $this;
        $this->db = new Database($conf['db']); 
        $this->session = new Session();
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View($this->request);
        $this->controller = new Controller($this->request);



        
    }

    public function isGuest()
    {
        
        $user = $this->session->get('user') ?? false;
        if(!$user->email) {
            return true;
        } 

        $show =  $user::findOne(['email' => $user->email ?? []]) ?? [];
        
        $user = (array) $user;
        $show = (array) $show;
        
        foreach (  $user as $key => $value){
            if($user[$key] !== $show[$key]){
               return true;
            } else {
                return false;
               
            }
        }

       
    }
    

    public function login(UserModel $user)
    {   
        $this->user = $user ?? false;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user;
        $this->session->set('user', $primaryValue);
        
        return true;

    }





    public function run()
    {
        try {
            $this->router->resolve();
            
        } catch (\Exception $e) {
            
            $this->response->setStatusCode($e->getCode());
            $status['code'] = $e->getCode();
            $status['message'] =$e->getMessage();
            echo json_encode($status);
        }
        
    }

    

    


}