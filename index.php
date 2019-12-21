<?php
require_once('app/bootstrap.php');

//print_r($_SERVER);

$router = new \system\Router\Router();
print_r($router->parseUrl());


