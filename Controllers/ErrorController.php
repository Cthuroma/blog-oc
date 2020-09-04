<?php


namespace App\Controllers;

use App\Classes\View;

class ErrorController extends Controller
{
    public function error(\Exception $e)
    {
        if($e->getCode() !== 404 && $e->getCode() !== 401){
            $code = 500;
        }else{
            $code = $e->getCode();
        }
        $this->pageData['pageTitle'] = 'Error ' . $code;
        $view = new View($code);
        $view->render($this->pageData);
    }
}
