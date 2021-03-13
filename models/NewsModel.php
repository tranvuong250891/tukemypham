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
    public  $create_at ;
    public string $class = "test";
    public  $news_id  ; 
    public string $category_id = "test";
    public string $tittle = '';
    public  $top_news ;
    public string $path = "" ;

    
    public function __construct($class)
    {
        $this->class = $class;
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
                'top_news' => $this->top_news,
            ],

        ];   
    }
    public static string $table = "news_detail";

    

    public function rules(): array
    {
        return [
            'tittle' =>[self::RULE_RIQUIRED ],
            'img' =>[self::RULE_RIQUIRED ],
            'category_id' =>[self::RULE_RIQUIRED],
            'description' =>[self::RULE_RIQUIRED],
            'path' =>[self::RULE_RIQUIRED],
            'news_id' => [self::RULE_RIQUIRED],
            'top_news' => [self::RULE_RIQUIRED, self::RULE_INT],
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