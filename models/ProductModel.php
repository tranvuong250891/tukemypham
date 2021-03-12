<?php

namespace main\models;

use main\core\database\DbModel;
use main\core\Test;

class ProductModel extends DbModel
{
    public string $name = '';
    public $create_at;
    public string $price = '';
    public string $content = '';
    public string $img_id = '';
    public string $url_id = '';

    public function __construct()
    {
        $this->create_at = date('Y/m/d H:i:s');
    }

    public function tableName(): string
    {
        return 'products';
    }
    public function labels(): array
    {
        return [];
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function rules(): array
    {
        return [
            'name' => [self::RULE_RIQUIRED],
            'price' => [self::RULE_RIQUIRED, self::RULE_INT],
            'img_id' => [self::RULE_RIQUIRED],
        ];
    }

    public function attributes(): array
    {
        return [
            'name', 'price', 'img_id', 'content', 'create_at', 'url_id'
        ];    
    }

    public function getAll()
    {
        $products = parent::getAll();
        foreach ($products as $k => $product ){
            $products[$k]['img_id'] = explode(",",  $product['img_id']);
        }
         return $products;

    }

    public function save()
    {
      
        return parent::save();
    }
       

    
    
}