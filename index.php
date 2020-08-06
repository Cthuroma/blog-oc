<?php

include_once('config.php');

Autoload::start();

$request = isset($_GET['r'])?$_GET['r']:'post_list';

$router = new Router($request);
$router->renderController();

