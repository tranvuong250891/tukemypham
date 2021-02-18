<?php
namespace main\models;

use main\core\database\DbModel;
use main\core\Main;

class CommentModel extends DbModel
{

    public $content = '';
    public $create_at = '';
    public $email = '';
    public  int $star ;
    public  $url_name = '' ;

    public function __construct()
    {
       

    }



    public function labels(): array
    {
        return [];
    }

    public function rules(): array
    {
        return [
            'user_id' =>[self::RULE_RIQUIRED],

        ];
    }

    public function primaryKey(): string
    {
        return "id";
    }

    public function tableName( ): string
    {
        return 'comments';
    }

    public function attributes(): array
    {
        return [
            'content', 'email', 'create_at', 'url_name', 'star'
        ];
    }

    public function insert($email)
    {
        $this->create_at = date('Y/m/d H:i:s');

        $this->email = $email;
        
       
        parent::save();

    }

}