<?php
namespace main\core\exceptions;

class NotFoundException extends \Exception
{
    protected $message = "Page not Found" ;
    protected $code = 404;
            
}