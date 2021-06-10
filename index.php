<?php
spl_autoload_register(function($class) {
    require_once strtolower(str_replace('\\', '/', $class) . '.php');
});

use catalog\controllers;
use catalog\routes\route;
session_start();
$_SESSION['name'] = $_COOKIE['PHPSESSID'];
//print_r($_SESSION['name']);
//print_r($_SESSION['basket']);
$route = new route();
$curentRoute = $route->getRoute();
$id = $route->id;


if ($curentRoute == $route->map['home']){
    $page = new controllers\homeController();
    $page->display();
}

if ($curentRoute == $route->map['product'].$id){
    $page = new controllers\productController();
    $page->display($id);
}

if ($curentRoute == $route->map['about']){
    $page->display();
}
if ($curentRoute == $route->map['addProduct'].$id){
    $basket = new controllers\basketController();
    $basket->addProduct($id);
    //$basket->delete();
}
