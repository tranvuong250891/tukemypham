<?php

namespace main\models;

use main\core\model\Model;
use main\core\database\DbModel;

class UserModel extends DbModel
{
    public const STATUS_INACTIVE = 0;

    public string $name = '';
    public string $email = '';
    public int $status = self::STATUS_INACTIVE;
    public string $pass = '';
    public string $repass = '';

    public function __construct()
    {
        
    }

    public function attributes(): array
    {
        return [
            'email', 'name', 'status', 'pass'
        ];
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function tableName(): string
    {
        return 'users';
    }

    public function rules(): array
    {
        return [
            'email' => [self::RULE_RIQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class'=> self::class]], 
            'pass' => [self::RULE_RIQUIRED, [self::RULE_MIN, 'min'=>6], [self::RULE_MAX, 'max'=>24]],
            'repass' => [self::RULE_RIQUIRED, [self::RULE_MATCH, 'match'=> 'pass']]
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'Email',
            'pass' => "Mat khau",
            'repass' => "Mat khau"
        ];
    }

    public function save()
    {
        $this->status = self::STATUS_INACTIVE;
        $this->pass = password_hash($this->pass, PASSWORD_DEFAULT);
        return parent::save();
    }





}