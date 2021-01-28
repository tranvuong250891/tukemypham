<?php
namespace main\models;

use main\core\database\DbModel;

class CartModel extends DbModel
{
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
        return 'cart';
    }

    public function attributes(): array
    {
        return [];
    }

}