<?php


namespace App\Classes;


class Session
{
    public function __construct(){
        if(!$this->get('csrf')){
            $this->set('csrf', sha1(uniqid('blog-oc', true)));
        }
    }


    public function get($var)
    {
        if(isset($_SESSION[$var])){
            return $_SESSION[$var];
        }
        return false;
    }

    public function set($var, $value)
    {
        $_SESSION[$var] = $value;
    }

    public function unset($var)
    {
        unset($_SESSION[$var]);
    }
}
