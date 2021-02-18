<?php
namespace main\controllers;

use main\core\Controller;
use main\core\Main;
use main\core\Request;
use main\core\Response;
use main\models\OrderDetailModel;
use main\models\OrderModel;

class OrderController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request, Response $response)
    {
        if(Main::$main->session->get(CartController::CART)['count'] > 0){
            $this->render([], 'order.php');
        } else {
            $response->redirect('/');
        };
        
    }

    public function insert(Request $request)
    {
        
        $orderModel = new OrderModel();
        $orderModel->loadData($request->getBody());
        
        if($orderModel->validate()){
            $orderModel->save();
            $code = $orderModel->code;
            $oderDetailModel = new OrderDetailModel($code);
            $oderDetailModel->save();
            (Main::$main->session->remove(CartController::CART));
            $status = "success";
        } else {
            $status = $orderModel->errors;
        }

        
        echo json_encode($status);


    }


}