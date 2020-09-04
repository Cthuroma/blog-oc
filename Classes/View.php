<?php

namespace App\Classes;

class View
{

    private $page;

    public function __construct($page = null)
    {
        $this->page = $page;
    }

    public function render($data = array())
    {
        if(isset($data['admin'])){
            $path = ADMIN_VIEWS;
        }else{
            $path = VIEWS;
        }
        $page = $this->page;
        ob_start();
        include_once $path.$page.'.php';
        $pageContent = ob_get_clean();
        include_once $path.'template.php';
    }

    public function redirect($route)
    {
        header("Location: ".HOST.$route);
        exit;
    }

}
