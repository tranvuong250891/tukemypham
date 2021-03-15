<?php
namespace main\core\middlewares;

use main\core\Main;
use main\core\exceptions\ForbiddenException;
use main\core\Test;

class AuthMiddleware extends BaseMiddleware
{
    public array $action = [] ;

    public function __construct(array $action = [])
    {
        $this->actions = $action;
        // var_dump($this->actions);
    }

    public function execute()
    {
       
        if(Main::$main->isGuest()){
            
            if(empty($this->actions) || in_array( Main::$main->router->action, $this->actions) ){
               
                throw new ForbiddenException();
            }

        }
    }


    public function adminDashboard()
    {
        $user =  Main::$main->session->get('user');
        
        if($user->email !== 'test@gmail.com' || !password_verify(123123, $user->pass)){
            if(empty($this->actions) || in_array( Main::$main->router->action, $this->actions) ){
               
                throw new ForbiddenException();
            }
        }
      
    }

    



}