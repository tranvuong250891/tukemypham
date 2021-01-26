<?php
namespace main\models;

use main\core\Main;
use main\core\model\Model;

class LoginModel extends Model
{
   
    public string $name = '';
    public string $email = '';
    public string $pass = '';
    public string $repass = '';

    public function register()
    {
        echo "Creating new user";
    }

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

    public function login()
    {
        
        $user = UserModel::findOne(['email' => $this->email]);
        if(!$user){
            $this->addError('email', 'email nay` khong ton` tai. !!!');
            return false;

        }
        
        if(!password_verify($this->pass, $user->pass)){
            $this->addError('pass', 'mat khau nay` khong dung');
            return false;
        }
       
        
        return true;

        
    }

}