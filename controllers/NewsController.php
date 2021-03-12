<?php
namespace main\controllers;

use main\core\Controller;
use main\core\middlewares\AuthMiddleware;
use main\core\Request;
use main\core\Test;
use main\models\NewsModel;

class NewsController extends Controller
{   
    protected string $name;

    public function __construct(Request $request)
    {
        $this->login = new AuthMiddleware(['api', 'delete', 'update']);
        $this->login->execute();
        $this->newsModel = new NewsModel();
    }

    public function index()
    {
        $this->render([
            'tittle' => 'tin tuc'
        ], '/news/news.html');
        
    
    }

    public function show(Request $request)
    {
       if($request->getPath() === '/dashboardnews'){
            $this->render([
                'tittle' => 'tin tuc'
            ], '/dashboard/news.html');
        }
    }

    public function api(Request $request)
    {
        $req = $request->getBody();
        
        $res = $this->newsModel->getWhere($req['id']);
        foreach($res as $k =>$v){
            $newId = $v['news_id'];
            $res[$k]['news_id'] = $this->newsModel->getWhere('news',$newId)[0]['name'];
           
        }


        echo json_encode($res);
        


        


    //    $this->newsModel->save(['news_detail', 'url_seo'], 'category_id');
    }


}