<?php
spl_autoload_register(function($class) {
    require_once strtolower(str_replace('\\', '/', $class) . '.php');
});

use catalog\controllers;
use catalog\routes\route;
use catalog\models;

session_start();
$_SESSION['name'] = $_COOKIE['PHPSESSID'];

$route = new route();
$curentRoute = $route->getRoute();
$id = $route->id;

if ($curentRoute == $route->map['home']){
    $page = new controllers\homeController();
    $page->display();
}
if ($curentRoute == $route->map['category'].$id){
    $category = new controllers\categoryController();
    $category->display($id);
}
if ($curentRoute == $route->map['added']){
    $page = new controllers\homeController();
    $page->display();
}
if ($curentRoute == $route->map['deleted']){
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
if ($curentRoute == $route->map['addProductToBasket'].$id){
    $basket = new controllers\basketController();
    $basket->addProduct($id);
}
if ($curentRoute == $route->map['deleteProductFromBasket'].$id){
    $basket = new controllers\basketController();
    $basket->deleteProduct($id);
}
