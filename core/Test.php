<?php

namespace main\core;

class Test
{
    public static function show($var, $exit = true)
    {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
        if($exit){
            exit;
        };
    }

    public static function pr($var, $exit = true)
    {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
        if($exit){
            exit;
        };
    }
}