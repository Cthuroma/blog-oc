<?php

class Autoload
{
    public static function start()
    {
        spl_autoload_register(array(__CLASS__, 'load'));

        $root = $_SERVER['DOCUMENT_ROOT'];
        $host = $_SERVER['HTTP_HOST'];

        define('HOST', 'http://' . $host . '/');
        define('ROOT', $root);
        define('CONTROLLERS', ROOT . 'controllers/');
        define('VIEWS', ROOT . 'views/');
        define('MODELS', ROOT . 'models/');
        define('CLASSES', ROOT . 'classes/');

        define('ASSETS', HOST . 'assets/');
        define('VENDOR', HOST . 'vendor/');

        define('DBHOST', 'localhost');
        define('DBPORT', '3306');
        define('DBLOGIN', 'root');
        define('DBPASSWORD', '');
        define('DBNAME', 'mydb');
    }

    public static function load($class)
    {
        if (file_exists(MODELS . $class . '.php')) {
            include_once(MODELS . $class . '.php');
        } else if (file_exists(CLASSES . $class . '.php')) {
            include_once(CLASSES . $class . '.php');
        } else if (file_exists(CONTROLLERS . $class . '.php')) {
            include_once(CONTROLLERS . $class . '.php');
        };
    }
}
