<?php
namespace main\controllers\api;

use main\core\Controller;
use main\core\Main;
use main\core\middlewares\AuthMiddleware;
use main\core\Test;

class imgApi extends Controller
{
    public function __construct()
    {
        
        $this->login = new AuthMiddleware(['index', 'upload']);
        $this->login->execute();
    }

    public function index()
    {
        
        $files = scandir(Main::$rootPath.'/resources/img');
        $fileImgs = [];
        
        foreach ($files as $file){
            if (substr($file, -4) === '.jpg'){
                $fileImgs[] = $file;
            };
        }
        echo json_encode($fileImgs);
    }



}