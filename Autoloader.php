<?php

class Autoloader
{

    public static function run(){
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function autoload($className)
    {
        $className = str_replace('App\\', '', $className);
        $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        $filePath = '../'.$className.'.php';
        if(file_exists($filePath)){
            include_once $filePath;
        }
    }
}
