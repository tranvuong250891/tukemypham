<?php
namespace main\controllers;

use main\core\Controller;
use main\core\Request;
use main\core\Response;
use main\core\Test;
use main\models\ProductModel;
use main\models\ProductsModel;

use main\core\middlewares\AuthMiddleware;
use main\models\SeoModel;

class ProductController extends Controller
{
    protected string $id;

    public function __construct(Request $request)
    {
        $this->login = new AuthMiddleware(['insert', 'delete', 'update']);
        $this->login->execute();
        $this->id = $request->getBody()['id'] ?? '';
        $this->model = new ProductModel();
        $this->seoModel = new SeoModel(static::class);
        $this->productsModel = new ProductsModel(static::class);
    }

    public function index(Request $request)
    {
        $req = $request->getBody();
        if($req['field']){
            $res = $this->productsModel->getWhere(false, false, 3 );
            echo json_encode($res);
            return;

        }

        echo json_encode($this->model->getAll());
    }

    public function show(Request $request, Response $response)
    {
        $data = $this->model->findOne(['id'=>$this->id]);
        $data = (array) $data;
        // echo $request->getPath();
        if($request->getPath() === '/editproduct'){
            $this->render([
                'name'=>'Vuong',
                'title'=> 'tilte',
            ], '/dashboard/content.html');
            return;
        };
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
        $errors = false;
        $seoModel = new SeoModel(static::class);
        if($request->isPost()){
            $req = $request->getBody();
            $req['url_id'] = $req['path']; 
            

            $this->model->loadData($req);
            $seoModel->loadData($req);
            $check = $seoModel->findOne(['path'=>$req['path']]);
            $seoModel->validate();
            $this->model->validate();
            if($check){
                $seoModel->addError('path', 'duong dan nay ton tai');
            }
            $errors = $this->model->errors + $seoModel->errors;
            if(!$errors){
                $category_id =  $this->model->save();
                $seoModel->_save($category_id);
                echo json_encode('success');
            } else {
                echo json_encode($errors);
            }
        }
    }

    public function update(Request $request)
    {
        $req = $request->getBody();
        $req['url_id'] = $req['path'];
        $this->model->loadData($req);
        $this->seoModel->loadData($req);
        if( $this->model->validate() &&  $this->seoModel->validate()){
            $this->model->update($req['id']);
            $this->seoModel->update($req['id'], 'category_id',['path']);
            echo json_encode('success');
        } else {
            $this->seoModel->validate();
            
            $errors = $this->model->errors + $this->seoModel->errors;
            
            echo json_encode($errors);
            
        }
        
        
    }

    public function delete(Request $request)
    {
        $req = $request->getBody();
       
        $this->model->delete(['url_id' => $req['path']]);
        $this->seoModel->delete(['path' => $req['path']]);
       
    }


}
