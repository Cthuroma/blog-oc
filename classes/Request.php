<?php

class Request
{
    public function input(String $paramName){
        $get = filter_input(INPUT_GET, $paramName);
        $post = filter_input(INPUT_POST, $paramName);
        if($get === null){
            return $get;
        }
        if($post === null){
            return $post;
        }
        return false;
    }
}
