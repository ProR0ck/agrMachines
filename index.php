<?php
spl_autoload_register(function($class) {
    require_once strtolower(str_replace('\\', '/', $class) . '.php');
});
session_start();
if (isset($_COOKIE['PHPSESSID'])) $_SESSION['name'] = $_COOKIE['PHPSESSID'];

use catalog\controllers;
use catalog\routes\route;
use catalog\models;



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
if (isset($_GET['search']) && $curentRoute == $route->map['search'].$_GET['search']){
    $page = new controllers\searchController();
    $page->display($_GET['search']);
}
if ($curentRoute == $route->map['newOrder']){
    $page = new controllers\orderController();
    $page->display();
}
if ($curentRoute == $route->map['register']){
    $page = new controllers\accountController();
    $page->display("register");
}
if ($curentRoute == $route->map['login']){
    $page = new controllers\accountController();
    $page->display("login");
}
if (isset($_GET['confirm'])){
    $page = new controllers\registerController();
    $page->display($_GET);
}