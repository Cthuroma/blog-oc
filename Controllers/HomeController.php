<?php

namespace App\Controllers;

use App\Classes\View;
use App\Classes\Mailer;

class HomeController extends Controller
{
    public function showHome()
    {
        $view = new View('home');
        $this->pageData['pageTitle'] = 'Blog-OC - Home';
        $this->pageData['notification'] = $this->request->input('notification');
        $view->render($this->pageData);
    }

    public function postContact()
    {
        $view = new View();
        $this->verifyCSRF();
        Mailer::sendContactMail($this->request->input('name'), $this->request->input('email'), $this->request->input('message'));
        $view->redirect('home');
    }

}
