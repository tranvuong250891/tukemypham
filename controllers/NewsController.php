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
        $this->login = new AuthMiddleware(['api', 'delete', 'update', 'insert']);
        $this->login->adminDashboard();
        $this->newsModel = new NewsModel(static::class);
    }

    public function index(Request $request)
    {
        $req = $request->getBody();
        if($req['field']){
            $res = $this->newsModel->getWhere('news_detail', [$req['field'], $req['top']]);
            echo json_encode($res);
            return;
        }

        

        $this->render([
            'tittle' => 'tin tuc'
        ], '/news/news.html');
        
    
    }

    public function detail(Request $request)
    {
        if($request->isGet()){
            $this->render([
                'tittle' => $request->getPath(),
            ], '/news/detail.html');
            return;
        }

        if($request->isPost()){
            $res = $this->newsModel->getWhere('news_detail', ['path', $request->namePath]);
            $res[0]['content'] = htmlspecialchars_decode($res[0]['content']);
            echo json_encode($res);
            return;
        }
        

        

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
        if($req['field'] === 'top_news') {
            
            $res = $this->newsModel->getWhere('news_detail', [$req['field'], $req['top']]);
            echo json_encode($res);
            return ;
        }
        
        $res = $this->newsModel->getWhere($req['id']);
        foreach($res as $k =>$v){
            $newId = $v['news_id'];
            $res[$k]['news_id'] = $this->newsModel->getWhere('news',['id',$newId])[0]['name'];
        }

        if($req['action'] === 'news_type'){
            $res = $this->newsModel->getWhere('news',$req['id']);
        }

        


        echo json_encode($res);
    }

    public function insert(Request $request)
    {
        $errors = [];
        $req = $request->getBody();
        $res = $this->newsModel->loadData($req);
        $this->newsModel->validate();
        if($this->newsModel->validate() ){
            
            $this->newsModel->save(['news_detail', 'url_seo'], 'category_id');
            echo json_encode('success');
            
        } else {
            $this->newsModel->validate();
            $errors =  $this->newsModel->errors;
            
            echo json_encode($errors);
        };   
    }

    public function delete(Request $request)
    {
        $req = $request->getBody();
        $res = $this->newsModel->getWhere('news_detail',$req['id']);
        $idUrl = $res[0]['path'];
        $this->newsModel->destroy('url_seo', ['path', $idUrl]);
        $this->newsModel->destroy('news_detail', ['id', $req['id']]);
        

    }


}