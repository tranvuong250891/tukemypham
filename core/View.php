<?php
namespace main\core;

use main\core\exception\NotFoundException;
use RangeException;

class View 
{
    protected string  $layout = 'trangchu';
    protected static string $path;
    public string $content;
    protected string $exFile;
    protected array $componentsForLayout = [];
    

    public function __construct(Request $request)
    {
        self::$path = $request->getPath();
        $this->pathFileResource = Main::$rootPath.'/resources' . self::$path;
        $this->pathFileResource;
        $this->getExFile();
        $this->loadResource();
       
    }

    public function getExFile()
    {
        
        if(strpos(self::$path, '/js/' , 0) === 0){
            $this->exFile =  "text/javascript";
        } elseif (strpos(self::$path, '/style/' , 0) === 0){
            $this->exFile = "text/css";
        } else {
            $this->exFile = false;
        }
       
    }

    public function renderView($params = [] ,string $content, $layout = false)
    {
        
        $this->getComponentsForLayout($this->setLayout($layout), $content, $params);
        $layout = $this->setLayout($layout, $params);
       
        $key =  (array_keys($this->componentsForLayout));
        $values = (array_values($this->componentsForLayout));
        // Test::show($this->componentsForLayout);
        echo str_replace($key, $values, $layout);
        
    }

    public function getComponentsForLayout(string $str, string $content, $params =[])
    {
        $this->content = $content ?? false;
        foreach ($params as $k => $v){
            $$k = $v;
        }
        foreach( explode('{{' , $str) as $string ){
          
            if (strpos($string, '}}')){
                $string = preg_replace('/\s+/','',$string);
                $string = str_replace('}}', '', $string);
                $string = strip_tags($string);
                ob_start();
                if($string === 'content'){
                    // echo $content;
                    include_once Main::$rootPath. "/views/contents/$this->content";
                }
                if(file_exists(Main::$rootPath. "/views/$string")){
                    include_once Main::$rootPath. "/views/$string";
                }
                
                $view =  ob_get_clean();
                
                $this->componentsForLayout["{{{$string}}}"] = $view;
            } 
       }
    }


    public function setLayout($layout = false, $params = [])
    {
        foreach ($params as $k => $v){
            $$k = $v;
        }
       if(!$layout){
            $layout = $this->layout;
           
       }
        ob_start();
        
        include Main::$rootPath. "/views/layouts/$layout.php";
        
        return ob_get_clean();
        
    }

    public function setContent(string $content, $params = [])
    {
        foreach ($params as $k => $v){
            $$k = $v;
        }
        ob_start();
        include_once Main::$rootPath. "/views/contents/$content.php";
        return ob_get_clean();
    }

    public function setFile(string $uri)
    {
        
        ob_start();
        header("Content-Type: $this->exFile");
        
        include $this->pathFileResource;
        return ob_get_clean();
        
    }

    public function helper()
    {
        
        if(file_exists($this->pathFileResource) && $this->exFile && strlen(self::$path) > 10 ){
            Router::addRoutes(self::$path, $this->setFile($this->pathFileResource));
        };
    }

    public function loadResource()
    {
        if(strpos(self::$path, '/lib/' , 0) === 0){
            if(strpos(self::$path, '.css') ){
                $this->exFile = 'text/css';
            } elseif(strpos(self::$path, '.js')){
                $this->exFile = 'text/javascript';
            } elseif (strpos(self::$path, '.woff')){
                $this->exFile = 'application/font-woff2';
            } elseif (strpos(self::$path, '.ttf')){
                $this->exFile = 'application/x-font-ttf .ttf';
            }
            else {
                $this->exFile = false;
            }
        
        }
        if(strpos(self::$path, '/img/' , 0) === 0){
           
            header('Content-Type: image/jpeg');
            readfile($this->pathFileResource);
        }

       
       
    }

    
   

}



