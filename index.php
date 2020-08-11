<?php

include_once('config.php');



Autoload::start();

$path = filter_input(INPUT_SERVER, 'REDIRECT_URL');

$router = new Router($path);
$router->renderController();

