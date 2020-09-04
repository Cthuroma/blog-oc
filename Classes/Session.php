<?php


namespace App\Classes;


class Session
{
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
