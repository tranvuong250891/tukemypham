<?php
namespace main\models;

use main\controllers\CartController;
use main\controllers\OrderController;
use main\core\database\DbModel;
use main\core\Main;

class OrderDetailModel extends DbModel
{
    public string $order_id = '';
    public string $product_id = '';
    public $qty = '';
    public  $price ;
    public  $create_at  ;

    public function __construct($code)
    {
        $this->order_id = $code;

    }

    public function labels(): array
    {
        return [
            'name' => 'Tên',
            'phone' => "số điện thoại",
            'addr' => 'địa chỉ'

        ];
    }

    public function rules(): array
    {
        return [
            'order_id' => [self::RULE_RIQUIRED],
            'product_id' => [self::RULE_RIQUIRED, self::RULE_INT],
            'create_at' => [self::RULE_RIQUIRED],
        ];
    }

    public function primaryKey(): string
    {
        return "id";
    }

    public function tableName(): string
    {
        return 'order_detail';
    }

    public function attributes(): array
    {
        return [
            'order_id', 'product_id', 'qty', 'price', 'create_at'
        ];
    }

    public function save()
    {
        $products = Main::$main->session->get(CartController::CART);
        $this->create_at = date('Y/m/d H:i:s');

        foreach($products as $key => $value){
            if(is_array( $value)){
                $this->product_id = $value['id'];
                $this->qty =  $value['qty'] ;
                $this->price = $value['price'];
                parent::save();
            }
          
        }

        
        

        
    }
}