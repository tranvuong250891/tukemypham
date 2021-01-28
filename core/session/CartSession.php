<?php
namespace main\core\session;

use main\core\Main;
use main\core\Test;
use main\models\ProductModel;

class CartSession
{
    protected const CARTSS = 'cart';
    protected int $count;
    
    public function __construct()
    {
      
        $this->productModel = new ProductModel();

        $carts = $_SESSION[self::CARTSS] ?? [];

        $this->set(1);
        // $this->set(3);
       
        
    }

    public function set($id, $qty = 1)
    {
        $productModel = new ProductModel();
        $getModel = $productModel->findOne(['id' => $id]);
        $_SESSION[self::CARTSS][$id]['qty'] += $qty;
    }


    public function __destruct()
    {
        $_SESSION[self::CARTSS]['count'] = 0;
        $carts =& $_SESSION[self::CARTSS];
            foreach($carts as $id => $cart){
                $qty =  $cart['qty'] ?? 0;
                $_SESSION[self::CARTSS]['count'] += $qty; 
            }

        echo json_encode($_SESSION[self::CARTSS]);
    }
       
}





/* 

$_SESSION['cart'] = [
    'count' => int 
    0 => ['id'=> int, 'qty' = int, 'price' => int, 'total' = qty*price ],

]



*/