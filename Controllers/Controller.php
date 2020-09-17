<?php

namespace App\Controllers;

use App\Classes\Request;
use App\Classes\Session;
use App\Classes\Mailer;

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
        $this->pageData = ['loggedUser' => $this->session->get('user') ? unserialize($this->session->get('user')) : false, 'csrf' => $this->session->get('csrf')];
    }

    public function verifyCSRF()
    {
        if (!$this->request->input('csrf') || $this->request->input('csrf') != $this->session->get('csrf')) {
            throw new \Exception('CSRF Verification Failed', 500);
        }
    }
}
