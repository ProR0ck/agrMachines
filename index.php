<?php
spl_autoload_register(function($class) {
    require_once strtolower(str_replace('\\', '/', $class) . '.php');
});

use catalog\controllers;
use catalog\routes\route;

$route = new route();
$curentRoute = $route->getRoute();
$id = $route->id;

$page = new controllers\homeController();

if ($curentRoute == $route->map['home']){
    $page->display();
}

if ($curentRoute == $route->map['product'].$id){
    //$page->display();
}

if ($curentRoute == $route->map['about']){
    $page->display();
}
