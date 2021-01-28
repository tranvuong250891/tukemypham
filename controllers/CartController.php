<?php

namespace main\controllers;
use main\core\Controller;
use main\core\Main;
use main\core\Request;
use main\core\Test;
use main\models\ProductModel;

class CartController extends Controller
{
    private const CART = 'cart';
    protected int $id;
    protected int $qty;
    protected array $carts = [];



    public function __construct(Request $request)
    {  
        $this->session = Main::$main->session;
        $this->id = $request->getBody()['id'] ?? false;
        $this->qty = $request->getBody()['qty'] ?? 1; 
        if( is_array($this->session->get(self::CART))){
            $this->carts = $this->session->get(self::CART);
        }
        
    }

    public function index()
    {

    }

    public function update(Request $request)
    {
        $this->carts[$this->id]['qty'] = $this->qty;
    }

    public function store()
    {
        
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
                if( is_numeric( $id)){
                    $getModel = $productModel->findOne(['id' => $id]);
                    $this->carts[$id]['name'] = $getModel->name; 
                    $this->carts['count'] += $cart['qty']; 
                }
            }
            
            $this->session->set(self::CART, $this->carts);
           
            echo json_encode($this->session->get(self::CART));
    }



}