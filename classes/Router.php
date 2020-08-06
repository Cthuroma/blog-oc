<?php

class Router
{
    private $request;

    private $routes = [
        "home"             => ["controller" => 'MainController', "method" => 'showHome'],
        "post"          => ["controller" => 'MainController', "method" => 'showPost'],
        "post_list"          => ["controller" => 'MainController', "method" => 'showPostList'],
    ];

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function getRoute()
    {
        $elements = explode('/', $this->request);
        return $elements[0];
    }

    public function getParams()
    {
        $params = array();

        $elements = explode('/', $this->request);
        unset($elements[0]);

        for ($i = 1; $i < count($elements); $i++) {
            $params[$elements[$i]] = $elements[$i + 1];
            $i++;
        }

        if ($_POST) {
            foreach ($_POST as $key => $val) {
                $params[$key] = $val;
            }
        }


        return $params;
    }

    public function renderController()
    {
        $route = $this->getRoute();
        $params = $this->getParams();
        if (key_exists($route, $this->routes)) {
            $controller = $this->routes[$route]['controller'];
            $method = $this->routes[$route]['method'];
            $currentController = new $controller();
            $currentController->$method($params);
        } else {
            echo '404';
        }
    }
}
