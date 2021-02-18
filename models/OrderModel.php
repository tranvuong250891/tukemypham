<?php
namespace main\models;

use main\core\database\DbModel;

class OrderModel extends DbModel
{
    public string $name = '';
    public string $note = '';
    public string $addr = '';
    public $create_at = '';
    public  $phone ;
    public  $code  ;

    public function __construct()
    {
        

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
            'name' => [self::RULE_RIQUIRED],
            'phone' => [self::RULE_RIQUIRED, self::RULE_INT],
            'addr' => [self::RULE_RIQUIRED],
        ];
    }

    public function primaryKey(): string
    {
        return "id";
    }

    public function tableName(): string
    {
        return 'orders';
    }

    public function attributes(): array
    {
        return [
            'name', 'phone', 'addr', 'note', 'code', 'create_at'
        ];
    }

    public function save()
    {
        $this->create_at = date('Y/m/d H:i:s');
       
        $code = random_int(10000, 99999);
        while ($code) {
            $where = ['code' => $code];
            if(!$this->findOne($where)){
              
                $this->code = $code;
                break;
            } 
            $code = random_int(10000, 99999);
        } 
        parent::save();
    }




}