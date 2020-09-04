<?php

namespace App\Controllers;

use App\Classes\Request;
use App\Classes\Session;

abstract class Controller
{
    protected $urlArgs;
    protected $request;
    protected $session;
    protected $pageData;

    public function __construct(array $urlArgs = [])
    {
        $this->request = new Request();
        $this->urlArgs = $urlArgs;
        $this->session = new Session();
        $this->pageData = ['loggedUser' => $this->session->get('user') ? unserialize($this->session->get('user')) : false];
    }

    public function setFlash($label, $message)
    {

    }
}
