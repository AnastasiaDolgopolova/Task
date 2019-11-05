<?php
//include __DIR__ . '/../functions.php';

$routes = [
     "/" => 'app/view/home.php',
    "/all" => 'app/controller/allApplication.php',
    "/send" => 'app/controller/validation.php'

];

$route = $_SERVER['REQUEST_URI'];

$get_param = stripos($route, '?');
if($get_param !== false){
    $route = substr($route, 0, $get_param);
}
if(array_key_exists($route, $routes)) {
    require_once __DIR__ . '/../'. $routes[$route];
    die;
} else {
    require_once __DIR__ . '/../app/view/404.php';
}
