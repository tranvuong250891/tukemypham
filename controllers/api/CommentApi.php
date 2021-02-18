<?php
namespace main\controllers\api;

use main\core\Controller;
use main\core\Main;
use main\core\Request;
use main\core\middlewares\AuthMiddleware;
use main\core\Test;
use main\models\CommentModel;

class CommentApi extends Controller
{
    public function __construct()
    {
        $this->model = new CommentModel();
        $this->login = new AuthMiddleware(['index']);
        $this->login->execute();
    }
    
    public function index(Request $request)
    {
        $data = $request->getBody() ?? [];
        $this->model->loadData($data);
        $email = Main::$main->session->get('user')->email;
        $data = $this->model->insert($email);
        
        echo json_encode($this->model);


    }

    public function show(Request $request)
    {
        $urlName = $request->getBody() ?? [];
        $data = $this->model->getAll(['url_name' => $urlName['url_name']]);
        

        $data['user'] = Main::$main->session->get('user');
        
        
        echo json_encode($data);
    }

}