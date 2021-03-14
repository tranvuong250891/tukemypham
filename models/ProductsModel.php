<?php
namespace main\models;

use main\core\Controller;
use main\core\database\DbsModel;
use main\core\Main;
use main\core\model\Model;
use main\core\Test;

class ProductsModel extends DbsModel
{
   
    public $create_at;
    public $class;

    
    public function __construct($class)
    {
        $this->class = $class;
        $this->create_at = date('Y/m/d H:i:s');
    }

    public function tableName(): array
    {
        return [];   
    }
    public static string $table = "products";

    

    public function rules(): array
    {
        return [
            
        ];
    }

    public function labels(): array
    {
       return [
            
       ];
    }

    public function attributes(): array
    {
        return [
            'name', 'price', 'img_id', 'content', 'create_at', 'path'
        ];    
    }

    public function _save(array $tables, $match)
    {

    }

    
}