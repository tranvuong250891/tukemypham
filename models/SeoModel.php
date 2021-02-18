<?php
namespace main\models;

use main\core\database\DbModel;

class SeoModel extends DbModel
{
    public $name = '';
    public $path = '';
    public $class = '';
    public $create_at;

    public function labels(): array
    {
        return [];
    }

    public function rules(): array
    {
        return [];
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
            'name', 'class', 'create_at', 'path'
        ];
    }

}