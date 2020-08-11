<?php

class Request
{
    public function input(String $paramName){
        $get = filter_input(INPUT_GET, $paramName);
        $post = filter_input(INPUT_POST, $paramName);
        if(!is_null($get)){
            return $get;
        }
        if(!is_null($post)){
            return $post;
        }
        return false;
    }
}
