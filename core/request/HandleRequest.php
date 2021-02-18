<?php 
namespace main\core\request;

use main\core\Test;
use main\core\Main;

/* 
    Xu ly request cho Router ;
*/


abstract class HandleRequest
{
    public string $path;
    public string $pathCli;
    public string $handledPath;
    public $urlSeo = false;
    public string $pathApi;

    abstract public function request() : string;

    public function __construct()
    {
        $this->request();
        $this->setPathCli();
        $this->setPath();
        $this->getPath();
        $path = substr($this->getPath(), 1) ;
        $this->urlSeo =  Main::$main->db->search('url_seo',['path' => $path]);
        
        

        
       
        

    }

    public function setPathCli()
    {
        if(is_string($this->request())){
            $this->pathCli = strtolower($this->request());
        } else {
            echo "loi duong dan". "<br>";
            exit;
        }
    }

    public function setPath()
    {
       
        $this->path = preg_replace('/[^A-Za-z0-9\-\.\/\?\=\&\_]/', '', $this->pathCli);
        if($this->path === $this->pathCli){
            $position = strpos($this->path, '?');
            if($position !== false){
                $this->path =  substr($this->path, 0 , $position); 
                }
            $this->handledPath = $this->path;
            
        } else {
            echo "loi ky tu dac biet trong duong dan"."<br>";
            exit;
        }

    }

    public function getPath()
    {
        return  $this->handledPath ?? '/';

    }

    public function get(){
        return $_GET;
    }

    

    

}