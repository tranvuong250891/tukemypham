<?php
namespace main\core\exceptions;

class ForbiddenException extends \Exception
{
    protected $message = "Ban khong co quyen truy cap vao !!!" ;
    protected $code = 403;
    
}