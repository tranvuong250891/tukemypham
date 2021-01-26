<?php

namespace main\controllers;

use main\core\Controller;
use main\core\Main;
use main\core\Request;
use main\core\Test;
use main\models\UserModel;
use main\models\LoginModel;

class ApiUserController extends Controller
{
    public Request $request;
    public $result;

    public function __construct(Request $request)
    {
        $this->request =$request;
        $this->model = new UserModel();
        $this->model->loadData($request->getBody());
    }

    public function login(Request $request)
    {
        
       
        if($this->model->validate()){
            $this->result = 'success';
            $this->model->save();
        } else {
            $this->result = ($this->model->errors);
        }
        echo json_encode($this->result);
    }


    public function logout()
    {

    }

    public function register()
    {
        $model = new LoginModel();
        $model->loadData($this->request->getBody());
       
        
        
        if( $model->login() && $model->validate() ){
            $this->result = 'success';
            Main::$main->session->set('user',  $model->email);
            
        } else {
            $this->result = ($model->errors);
        }


        echo json_encode($this->result);
    }

    public function destroy()
    {
        session_destroy();
    }



}