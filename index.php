<?php
spl_autoload_register(function($class) {
    require_once strtolower(str_replace('\\', '/', $class) . '.php');
});

use catalog\controllers;
use catalog\routes\route;

$route = new route();
$curentRoute = $route->getRoute();
$id = $route->id;

$menu = new controllers\menuController();
$products = new controllers\productsController();
$footer = new controllers\footerController();

if ($curentRoute == $route->map['home']){
    $menu->display();
    $products->display();
    $footer->display();
}

if ($curentRoute == $route->map['product'].$id){
    $menu->display();
    $products->display($id);
    $footer->display();
}

if ($curentRoute == $route->map['about']){
    $menu->display();
    $footer->display();
}
