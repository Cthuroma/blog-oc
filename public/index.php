<?php

session_start();

include_once('../Autoloader.php');

Autoloader::run();

App\Config::start();

$path = filter_input(INPUT_SERVER, 'REDIRECT_URL');

$router = new App\Classes\Router($path);
$router->renderController();

