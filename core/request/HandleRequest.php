<?php 
namespace main\core\request;

/* 
    Xu ly request cho Router ;
*/


abstract class HandleRequest
{
    public string $path;
    public string $pathCli;
    public string $handledPath;

    abstract public function request() : string;

    public function __construct()
    {
       
        $this->setPathCli();
        $this->setPath();
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
       
        $this->path = preg_replace('/[^A-Za-z0-9\-\.\/]/', '', $this->pathCli);
       
        if($this->path === $this->pathCli){
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

    

}