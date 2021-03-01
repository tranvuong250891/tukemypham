<?php
namespace main\models;

use main\core\database\DbModel;
use main\core\Test;

class SeoModel extends DbModel
{
    
    public $path = '';
    public $class = '';
    public $create_at;
    

    public function __construct($class)
    {
       $this->class = $class;
       $this->create_at = date('Y/m/d H:i:s');
       
    
    }

    public function labels(): array
    {
        return [];
    }

    public function rules(): array
    {
        return [
            'path' => [self::RULE_RIQUIRED],
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
             'class', 'create_at', 'path'
        ];
    }

    public function save()
    {
        return parent::save();
    }

   

}