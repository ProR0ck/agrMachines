<?php
spl_autoload_register(function($class) {
    require_once strtolower(str_replace('\\', '/', $class) . '.php');
});
include "vendor/autoload.php";

//define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
/*function autoloader($className)
{
    try {
        $path = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        $file = ROOT_PATH . $path . '.php';
        if (!is_file($file))
            throw new \Exception ($file.' file not found');
        include ($file);
    } catch (\Exception $ex) {
        echo $ex->getMessage();
        exit;
    }
}*/
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
elseif ($curentRoute == $route->map['category'].$id){
    $category = new controllers\categoryController();
    $category->display($id);
}
elseif ($curentRoute == $route->map['added']){
    $page = new controllers\homeController();
    $page->display();
}
elseif ($curentRoute == $route->map['deleted']){
    $page = new controllers\homeController();
    $page->display();
}
elseif ($curentRoute == $route->map['product'].$id){
    $page = new controllers\productController();
    $page->display($id);
}
elseif ($curentRoute == $route->map['about']){
    $page->display();
}
elseif ($curentRoute == $route->map['addProductToBasket'].$id){
    $basket = new controllers\basketController();
    $basket->addProduct($id);
}
elseif ($curentRoute == $route->map['deleteProductFromBasket'].$id){
    $basket = new controllers\basketController();
    $basket->deleteProduct($id);
}
elseif (isset($_GET['search']) && $curentRoute == $route->map['search'].$_GET['search']){
    $page = new controllers\searchController();
    $page->display($_GET['search']);
}
elseif ($curentRoute == $route->map['newOrder']){
    $order = new controllers\orderController();
    $order->display();
}
elseif ($curentRoute == $route->map['newOrderComplete']){
    $order = new controllers\orderController();
    $order->display($_POST);
}
elseif ($curentRoute == $route->map['register']){
    $page = new controllers\accountController();
    $page->display("register");
}
elseif ($curentRoute == $route->map['login']){
    $page = new controllers\accountController();
    $page->display("login");
}
elseif ($curentRoute == $route->map['registerChek']){
    $user = new controllers\registerController();
    $user->register($_POST);
}
elseif ($curentRoute == $route->map['logChek']){
    $user = new controllers\loginController();
    $user->login($_POST);
}
elseif ($curentRoute == $route->map['logout']){
    $user = new controllers\loginController();
    $user->logout();
}
elseif ($curentRoute == $route->map['userInfo']){
    $user = new controllers\userInfoController();
    $user->display();
}
elseif ($curentRoute == $route->map['history']){
    $user = new controllers\userHistoryController();
    $user->display();
}

elseif ($curentRoute == $route->map['account']){
    $user = new controllers\accountController();
    $user->dsplayInfo();
}
elseif ($curentRoute == $route->map['adminHome']){
    $admin = new controller\homeController();
    $admin->display();
}
elseif ($curentRoute == $route->map['adminAuth']){
    $user = new controller\logController();
    $user->display();
}
elseif ($curentRoute == $route->map['adminAuthFail']){
    $user = new controller\logController();
    $user->display(true);
}
elseif ($curentRoute == $route->map['adminSignIn']){
    $user = new controller\logController();
    $user->signIn($_POST);
}
elseif ($curentRoute == $route->map['adminSignOut']){
    $user = new controller\logController();
    $user->signOut();
}
//категории в админке
elseif ($curentRoute == $route->map['adminCategories']){
    $page = new controller\categoryController();
    $page->display();
}
elseif ($curentRoute == $route->map['adminCategoriesUpdate'].$id){
    $page = new controller\categoryController();
    $page->showUpdate($id);
}
elseif ($curentRoute == $route->map['adminCategoriesUpdateComplete']){
    $page = new controller\categoryController();
    $page->makeUpdate($_POST);
}
elseif ($curentRoute == $route->map['adminCategoriesUpdateSuccess']){
    $page = new controller\categoryController();
    $page->display(true);
}
elseif ($curentRoute == $route->map['adminCategoriesInsert']){
    $page = new controller\categoryController();
    $page->showInsert();
}
elseif ($curentRoute == $route->map['adminCategoriesInsertComplete']){
    $page = new controller\categoryController();
    $page->makeInsert($_POST);
}
elseif ($curentRoute == $route->map['adminCategoriesInsertSuccess']){
    $page = new controller\categoryController();
    $page->display(true);
}
elseif ($curentRoute == $route->map['adminCategoriesDeleteSuccess']){
    $page = new controller\categoryController();
    $page->display(true);
}
//продукты в админке
elseif ($curentRoute == $route->map['adminProducts']){
    $page = new controller\productController();
    $page->display();
}
elseif ($curentRoute == $route->map['adminProductsUpdate'].$id){
    $page = new controller\productController();
    $page->showUpdate($id);
}
elseif ($curentRoute == $route->map['adminProductsInsert']){
    $page = new controller\categoryController();
    $page->showInsert();
}

/*
elseif (strpos($curentRoute,$route->map['adminCategoriesDeleteComplete']) == 0){
    $page = new controller\categoryController();
    $page->makeDelete($_GET);
}*/
else {
    $page = new controllers\homeController();
    $page->display(true);
}
