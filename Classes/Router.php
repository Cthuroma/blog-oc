<?php

namespace App\Classes;

class Router
{
    private $path;

    private $routes = [
        "home"             => ["controller" => 'HomeController', "method" => 'showHome'],
        "post"             => ["controller" => 'PostController', "method" => 'showPost'],
        "posts"            => ["controller" => 'PostController', "method" => 'showPostList'],
        "post-comment"     => ["controller" => 'PostController', "method" => 'postComment'],
        "register"         => ["controller" => 'AuthController', "method" => 'showRegister'],
        "login"            => ["controller" => 'AuthController', "method" => 'showLogin'],
        "post-register"    => ["controller" => 'AuthController', "method" => 'postRegister'],
        "validate-mail"    => ["controller" => 'AuthController', "method" => 'validateMail'],
        "post-login"       => ["controller" => 'AuthController', "method" => 'login'],
        "logout"           => ["controller" => 'AuthController', "method" => 'logout'],
        "admin-home"       => ["controller" => 'AdminController', "method" => 'showHome'],
        "admin-newpost"    => ["controller" => 'AdminController', "method" => 'showNewPost'],
        "post-newpost"     => ["controller" => 'AdminController', "method" => 'createPost'],
        "admin-posts"      => ["controller" => 'AdminController', "method" => 'showPostList'],
        "admin-roles"      => ["controller" => 'AdminController', "method" => 'showRoles'],
        "admin-validate"   => ["controller" => 'AdminController', "method" => 'commentValidation'],
        "admin-comlist"    => ["controller" => 'AdminController', "method" => 'commentList'],
        "validate-comment" => ["controller" => 'AdminController', "method" => 'validateComment'],
        "promoteuser"      => ["controller" => 'AdminController', "method" => 'promoteUser'],
        "downgradeuser"    => ["controller" => 'AdminController', "method" => 'downgradeUser'],
    ];

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getRoute()
    {
        $elements = explode('/', $this->path);
        return ($elements[1] !== '') ? ($elements[1]) : ('home');
    }

    public function getArgs()
    {
        $elements = explode('/', $this->path);
        array_splice($elements, 0, 2);
        return $elements;
    }

    public function renderController()
    {
        $route = $this->getRoute();
        $urlArgs = $this->getArgs();
        try {
            if (key_exists($route, $this->routes)) {
                $controller = 'App\Controllers\\';
                $controller .= $this->routes[$route]['controller'];
                $method = $this->routes[$route]['method'];
                $currentController = new $controller($urlArgs);
                $currentController->$method();
            } else {
                throw new \Exception('Page not found', 404);
            }
        }catch(\Exception $e) {
            $errorController = new \App\Controllers\ErrorController();
            $errorController->error($e);
        }
    }
}
