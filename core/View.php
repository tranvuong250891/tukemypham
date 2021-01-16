<?php
namespace main\core;

use main\core\exception\NotFoundException;
use RangeException;

class View 
{
    protected string  $layout = 'trangchu';
    protected static string $path;
    protected string $pathFileCss;
    protected string $pathFileJs;
    protected string $exFile;

    public function __construct(Request $request)
    {
        self::$path = $request->getPath();
        $this->pathFile = Main::$rootPath.'/views' . self::$path;
        $this->getExFile();
        
        if(file_exists($this->pathFile) && $this->exFile && strlen(self::$path) > 10 ){
            Router::addRoutes(self::$path, $this->setFile($this->pathFile));
        };
    }

    public function getExFile()
    {
        if(strpos(self::$path, '/js/' , 0) === 0){
            $this->exFile =  "javascript";
        } elseif (strpos(self::$path, '/style/' , 0) === 0){
            $this->exFile = "css";
        } else {
            $this->exFile = false;
        }
        
    }

    public function renderView($params = [] ,string $content, $layout = false)
    {
        $renderContent = $this->setContent($content, $params);
        $renderLayout = $this->setLayout($layout);
        echo str_replace(['{{content}}'], [$renderContent], $renderLayout);
    }

    public function setLayout($layout)
    {
       if(!$layout){
            $layout = $this->layout;
       }
        ob_start();
        include_once Main::$rootPath. "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    public function setContent(string $content, $params = [])
    {
        foreach ($params as $k => $v){
            $$k = $v;
        }
        ob_start();
        include_once Main::$rootPath. "/views/$content/$content.php";
        return ob_get_clean();
    }

    public function setFile(string $uri)
    {
        ob_start();
        header("Content-Type: text/$this->exFile");
        include_once $this->pathFile;
        return ob_get_clean();
         
    }

}



