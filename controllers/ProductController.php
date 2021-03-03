<?php
namespace main\controllers;

use main\core\Controller;
use main\core\Request;
use main\core\Response;
use main\core\Test;
use main\models\ProductModel;
use main\core\middlewares\AuthMiddleware;
use main\models\SeoModel;

class ProductController extends Controller
{
    protected string $id;


    public function __construct(Request $request)
    {
        $this->login = new AuthMiddleware(['insert', 'delete']);
        $this->login->execute();
        $this->id = $request->getBody()['id'] ?? '';
        $this->model = new ProductModel();
        $this->seoModel = new SeoModel(static::class);
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
        $errors = [];
        $seoModel = new SeoModel(static::class);
        if($request->isPost()){
            $req = $request->getBody();
            $req['url_id'] = $req['path']; 
            

            $this->model->loadData($req);
            $seoModel->loadData($req);
            
            
            if( $this->model->validate() &&  $seoModel->validate()){
                $this->model->save();
                $id = $this->model->fetchOne()['id'];
                $seoModel->_save($id);
                echo json_encode('success');
            } else {
                $seoModel->validate();
                
                $errors = $this->model->errors + $seoModel->errors;
                
                echo json_encode($errors);
                
            }
        }
    }

    public function update(Request $request)
    {
        
    }

    public function delete(Request $request)
    {
        $req = $request->getBody();
       
        $this->model->delete(['url_id' => $req['path']]);
        $this->seoModel->delete(['path' => $req['path']]);
       
    }


}
