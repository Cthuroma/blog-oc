<?php

namespace App;

class Config
{
    public static function start()
    {
        $root = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');
        $host = filter_input(INPUT_SERVER, 'HTTP_HOST');

        define('HOST', 'http://' . $host . '/');
        define('ROOT', $root.'../');
        define('VIEWS', ROOT . 'resources/views/');
        define('MAIL_VIEWS', ROOT.'resources/mail_views/');
        define('ADMIN_VIEWS', ROOT . 'resources/admin_views/');


        define('ASSETS', HOST . 'assets/');
        define('FRONT_VENDOR', HOST . 'assets/vendor/');

        define('STORAGE', HOST . 'storage/');

        define('UPLOADS', ROOT . 'public/assets/uploads/');

        define('MAIL_NO_REPLY', 'noreply@blog-oc.test');

        define('DBHOST', 'localhost');
        define('DBPORT', '3306');
        define('DBLOGIN', 'root');
        define('DBPASSWORD', '');
        define('DBNAME', 'mydb');
    }
}
