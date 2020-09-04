<?php

namespace App\Classes;

class Request
{
    public function input(string $paramName, $defaultValue = false){
        $get = filter_input(INPUT_GET, $paramName);
        $post = filter_input(INPUT_POST, $paramName);
        if($get !== null){
            return $get;
        }
        if($post !== null){
            return $post;
        }
        return $defaultValue;
    }
}
