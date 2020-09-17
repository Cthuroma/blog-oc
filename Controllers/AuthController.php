<?php


namespace App\Controllers;

use App\Classes\View;
use App\Models\User;
use App\Managers\UserManager;
use App\Classes\Mailer;


class AuthController extends Controller
{
    public function showRegister()
    {
        $view = new View('register');
        $this->pageData['pageTitle'] = 'Blog-OC - Register';
        $this->pageData['notification'] = $this->request->input('notification');
        $view->render($this->pageData);
    }

    public function showLogin()
    {
        $view = new View('login');
        $this->pageData['pageTitle'] = 'Blog-OC - Login';
        $this->pageData['notification'] = $this->request->input('notification');
        $view->render($this->pageData);
    }

    public function postRegister()
    {
        $view = new View();
        $this->verifyCSRF();
        if($this->request->input('pass') !== $this->request->input('re_pass')){
            $view->redirect('register?notification=pass');
        }else {
            $user = User::create(
                $this->request->input('name'),
                $this->request->input('email'),
                $this->request->input('pass')
            );
            $manager = new UserManager;
            $id = $manager->register($user);
            if($id) {
                Mailer::sendValidationMail($user);
                $view->redirect('login?notification=registered');
            }else{
                $view->redirect('register?notification=mail');
            }
        }
    }

    public function validateMail()
    {
        $view = new View();
        $manager = new UserManager;
        if($manager->validateMail($this->request->input('token'))){
            $view->redirect('login?notification=validatedmail');
        }
        echo 'An error occured during mail validation.';
    }

    public function login()
    {
        $view = new View();
        $this->verifyCSRF();
        $manager = new UserManager;
        $logged = $manager->login($this->request->input('mail'));
        if($logged && password_verify($this->request->input('pass'), $logged->getPassword())){
            $this->session->set('user', serialize($logged));
            $view->redirect('home?notification=logged');
        }else{
            $view->redirect('login?notification=error');
        }

    }

    public function logout()
    {
        $view = new View();
        $this->verifyCSRF();
        $this->session->unset('user');
        $view->redirect('home?notification=loggedout');
    }
}
