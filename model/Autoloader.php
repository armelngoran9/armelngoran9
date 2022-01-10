<?php
namespace AppGestion\model;

class Autoloader{
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($class){
        
        $class = "../" . $class. ".php";
        $class = str_replace('\\', '/', $class);
        $class = str_replace("AppGestion/", "", $class);

        require_once $class;

    }

}