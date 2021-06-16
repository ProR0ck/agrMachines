<?php
spl_autoload_register(function($class) {
    require_once strtolower(str_replace('\\', '/', $class) . '.php');
});
session_start();
if (isset($_COOKIE['PHPSESSID'])) $_SESSION['name'] = $_COOKIE['PHPSESSID'];

use catalog\controllers;
use catalog\routes\route;
use admin\controller;
//use admin\models\isUserModel;
//use catalog\models;

$route = new route();
$route->safeExit();//безопасный выход из админки
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
    $order = new controllers\orderController();
    $order->display();
}
if ($curentRoute == $route->map['newOrderComplete']){
    $order = new controllers\orderController();
    $order->display($_POST);
}
if ($curentRoute == $route->map['register']){
    $page = new controllers\accountController();
    $page->display("register");
}
if ($curentRoute == $route->map['login']){
    $page = new controllers\accountController();
    $page->display("login");
}
if ($curentRoute == $route->map['registerChek']){
    $user = new controllers\registerController();
    $user->register($_POST);
}
if ($curentRoute == $route->map['logChek']){
    $user = new controllers\loginController();
    $user->login($_POST);
}
if ($curentRoute == $route->map['logout']){
    $user = new controllers\loginController();
    $user->logout();
}
if ($curentRoute == $route->map['userInfo']){
    $user = new controllers\userInfoController();
    $user->display();
}
if ($curentRoute == $route->map['history']){
    $user = new controllers\userHistoryController();
    $user->display();
}
if ($curentRoute == $route->map['account']){
    $user = new controllers\accountController();
    $user->dsplayInfo();
}
if ($curentRoute == $route->map['adminHome']){
    $admin = new controller\homeController();
    $admin->display();
}
if ($curentRoute == $route->map['adminAuth']){
    $user = new controller\logController();
    $user->display();
}
if ($curentRoute == $route->map['adminSignIn']){
    $user = new controller\logController();
    $user->signIn($_POST);
}
if ($curentRoute == $route->map['adminSignOut']){
    $user = new controller\logController();
    $user->signOut();
}
if ($curentRoute == $route->map['adminCategories']){
    $page = new controller\categoryController();
    $page->display();
}
if ($curentRoute == $route->map['adminCategoriesUpdate'].$id){
    $page = new controller\categoryController();
    $page->showUpdate($id);
}
if ($curentRoute == $route->map['adminCategoriesUpdateComplete']){
    $page = new controller\categoryController();
    $page->makeUpdate($_POST);
}
