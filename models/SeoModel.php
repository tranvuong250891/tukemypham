<?php
namespace main\models;

use main\core\database\DbModel;
use main\core\Test;

class SeoModel extends DbModel
{
    
    public $path = '';
    public $class = '';
    public $create_at;
    public $category_id ;
    

    public function __construct($class = null)
    {
       $this->class = $class;
       $this->create_at = date('Y/m/d H:i:s');
       
    
    }

    public function labels(): array
    {
        return [
            'path' => 'duong dan '
        ];
    }

    public function rules(): array
    {
        return [
            'path' => [self::RULE_RIQUIRED, [self::RULE_UNIQUE, 'class'=> self::class]],
            'class' =>  [self::RULE_RIQUIRED],
        ];
    }

    public function primaryKey(): string
    {
        return "id";
    }

    public function tableName( ): string
    {
        return 'url_seo';
    }

    public function attributes(): array
    {
        return [
             'class', 'create_at', 'path', 'category_id'
        ];
    }

    public function _save($id)
    {
        $this->category_id = $id;
        return parent::save();
    }

   

}