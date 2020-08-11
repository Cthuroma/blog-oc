<?php

class Router
{
    private $path;

    private $routes = [
        "home"             => ["controller" => 'MainController', "method" => 'showHome'],
        "post"             => ["controller" => 'MainController', "method" => 'showPost'],
        "post-list"        => ["controller" => 'MainController', "method" => 'showPostList'],
    ];

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getRoute()
    {
        $elements = explode('/', $this->path);
        return ($elements[1] !== '') ? ($elements[1]) : ('post-list');
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
        $request = new Request;
        if (key_exists($route, $this->routes)) {
            $controller = $this->routes[$route]['controller'];
            $method = $this->routes[$route]['method'];
            $currentController = new $controller();
            $currentController->$method($request, $urlArgs);
        } else {
            $view = new View('404');
            $view->render();
        }
    }
}
