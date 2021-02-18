<?php

namespace main\controllers;
use main\core\Controller;
use main\core\Main;
use main\core\Request;
use main\core\Test;
use main\models\ProductModel;

class CartController extends Controller
{
    public const CART = 'cart';
    protected int $id;
    protected int $qty;
    protected array $carts = [];



    public function __construct(Request $request)
    {  
        $this->session = Main::$main->session;
        $this->id = $request->getBody()['id'] ?? false;
        $this->qty = $request->getBody()['qty'] ?? 0; 
        if( is_array($this->session->get(self::CART))){
            $this->carts = $this->session->get(self::CART);
        }
        
    }

    public function index()
    {
        
        $this->render($this->carts, 'cart.php');
       
    }

    public function update(Request $request)
    {
       
            $data =  json_decode(file_get_contents('php://input')) ?? [];
            foreach($data as $key => $value){
                
                if($value <= 0){
                   
                    unset($this->carts[$key]);
                    continue;
                }
                $this->carts[$key]['qty'] = $value;
                
                

            }
           
    }

    public function store()
    {
        if($this->qty <= 0){
            $this->qty = 1 ;
        }
        
        $this->carts[$this->id]['qty'] += $this->qty ;
        
    }

    public function show()
    {
        
    }

    public function destroy()
    {
    
       unset($this->carts);
    }

    public function __destruct()
    {
        $this->carts['count'] = 0;
        $productModel = new ProductModel();
        
            foreach($this->carts as $id => $cart){
                
                if( is_numeric( $id) && $id){
                   
                    $getModel = $productModel->findOne(['id' => $id]);
                    if($getModel){
                        $this->carts[$id]['name'] = $getModel->name;
                        $this->carts[$id]['price'] = $getModel->price;
                        $this->carts[$id]['id'] = $getModel->id;
                        $this->carts[$id]['img_id'] =  $getModel->img_id;
                        $this->carts['count'] += $cart['qty']; 
                    }
                    
                }
            }
           
            $this->session->set(self::CART, $this->carts);
            
            echo json_encode($this->session->get(self::CART));
    }



}