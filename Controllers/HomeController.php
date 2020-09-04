<?php

namespace App\Controllers;

use App\Classes\View;

class HomeController extends Controller
{
    public function showHome()
    {
        $view = new View('home');
        $this->pageData['pageTitle'] = 'Blog-OC - Home';
        $this->pageData['notification'] = $this->request->input('notification');
        $view->render($this->pageData);
    }
}
