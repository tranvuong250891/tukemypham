<?php
namespace main\models;

use main\core\Controller;
use main\core\database\DbsModel;
use main\core\Main;
use main\core\model\Model;
use main\core\Test;

class NewsModel extends DbsModel
{
   
    public string $name = '';
    public string $content = '';
    public string $img = '';
    public string $description = '';
    public $create_at = '';
    public string $class = "test";
    public  int $news_id = 0 ; 
    public  $category_id = "test";
    public string $tittle = '';

    public string $path = "" ;

    
    public function __construct()
    {
        $this->create_at = date('Y/m/d H:i:s');
    }

    public function tableName(): array
    {
        return [
            'url_seo' => [
                'class' => $this->class,
                'path' => $this->path,
                'create_at'=> date('Y/m/d H:i:s'),
                'category_id'=>  $this->category_id,
            ],
            'news' =>[
                'name' => $this->name,
                'create_at'=> date('Y/m/d H:i:s'),
            ],
            'news_detail' =>[
                'tittle' => $this->tittle,
                'create_at' => $this->create_at,
                'img' => $this->img,
                'description' => $this->description,
                'content' => $this->content,
                'news_id' => $this->news_id,
                'path' => $this->path,
            ],

        ];   
    }
    public static string $table = "news_detail";

    

    public function rules(): array
    {
        return [
            'email' =>[self::RULE_RIQUIRED ],
            'pass' =>[self::RULE_RIQUIRED, [self::RULE_MIN, 'min'=> 6], [self::RULE_MAX, 'max' => 24]],
        ];
    }

    public function labels(): array
    {
        return [

            'email' => 'Email',
            'pass' => 'Pass'
        ];
    }

    public function attributes(): array
    {
        return [
            'name', 'price', 'img_id', 'content', 'create_at', 'url_id'
        ];    
    }

    public function _save(array $tables, $match)
    {

    }

    
}