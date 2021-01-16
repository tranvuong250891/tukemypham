<?php
namespace main\core\exception;

class NotFoundException extends \Exception
{
    protected $message = "Ban khong co quyen truy cap va vao !!!" ;
    protected $code = 403;
    
}