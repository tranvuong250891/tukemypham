<?php
namespace main\core\middlewares;

use main\core\Main;
use main\core\exceptions\ForbiddenException;

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

}