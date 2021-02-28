<?php
namespace main\controllers;

use main\core\Controller;
use main\core\Request;
use main\core\Response;
use main\core\Test;
use main\models\ProductModel;
use main\core\middlewares\AuthMiddleware;

class ProductController extends Controller
{
    protected string $id;


    public function __construct(Request $request)
    {
        $this->login = new AuthMiddleware(['insert']);
        $this->login->execute();
        $this->id = $request->getBody()['id'] ?? '';
        $this->model = new ProductModel();
       
    }

    public function index()
    {
    

        echo json_encode($this->model->getAll());
    }

    public function show(Request $request, Response $response)
    {
        $data = $this->model->findOne(['id'=>$this->id]);
        $data = (array) $data;
       
        if(!$data){
            $response->redirect('/');
        }
        $this->render($data, 'productDetail.html');

        
        
    }

    public function detail(Request $request)
    {
        $request->urlSeo;
        if($request->isPost()){
            $data = $this->model->findOne(['id' => $request->urlSeo->category_id]);
            echo json_encode($data);
            exit;

        }
        
        $this->render([], 'productDetail.html');
        
    }

    public function insert(Request $request)
    {
        
        if($request->isPost()){
            Test::show($request->getBody());
        }
    }


}
