<?php
spl_autoload_register(function ($class) {
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

if ($curentRoute == $route->map['home']) {
    $page = new controllers\homeController();
    $page->display();
} elseif ($curentRoute == $route->map['category'] . $id) {
    $category = new controllers\categoryController();
    $category->display($id);
} elseif ($curentRoute == $route->map['added']) {
    $page = new controllers\homeController();
    $page->display();
} elseif ($curentRoute == $route->map['deleted']) {
    $page = new controllers\homeController();
    $page->display();
} elseif ($curentRoute == $route->map['product'] . $id) {
    $page = new controllers\productController();
    $page->display($id);
} elseif ($curentRoute == $route->map['about']) {
    $page->display();
} elseif ($curentRoute == $route->map['addProductToBasket'] . $id) {
    $basket = new controllers\basketController();
    $basket->addProduct($id);
} elseif ($curentRoute == $route->map['deleteProductFromBasket'] . $id) {
    $basket = new controllers\basketController();
    $basket->deleteProduct($id);
} elseif (isset($_GET['search']) && $curentRoute == $route->map['search'] . $_GET['search']) {
    $page = new controllers\searchController();
    $page->display($_GET['search']);
} elseif ($curentRoute == $route->map['newOrder']) {
    $order = new controllers\orderController();
    $order->display();
} elseif ($curentRoute == $route->map['newOrderComplete']) {
    $order = new controllers\orderController();
    $order->display($_POST);
} elseif ($curentRoute == $route->map['register']) {
    $page = new controllers\accountController();
    $page->display("register");
} elseif ($curentRoute == $route->map['login']) {
    $page = new controllers\accountController();
    $page->display("login");
} elseif ($curentRoute == $route->map['registerChek']) {
    $user = new controllers\registerController();
    $user->register($_POST);
} elseif ($curentRoute == $route->map['logChek']) {
    $user = new controllers\loginController();
    $user->login($_POST);
} elseif ($curentRoute == $route->map['logout']) {
    $user = new controllers\loginController();
    $user->logout();
} elseif ($curentRoute == $route->map['userInfo']) {
    $user = new controllers\userInfoController();
    $user->display();
} elseif ($curentRoute == $route->map['history']) {
    $user = new controllers\userHistoryController();
    $user->display();
} elseif ($curentRoute == $route->map['account']) {
    $user = new controllers\accountController();
    $user->dsplayInfo();
} elseif ($curentRoute == $route->map['adminHome']) {
    $admin = new controller\homeController();
    $admin->display();
} elseif ($curentRoute == $route->map['adminAuth']) {
    $user = new controller\logController();
    $user->display();
} elseif ($curentRoute == $route->map['adminAuthFail']) {
    $user = new controller\logController();
    $user->display(true);
} elseif ($curentRoute == $route->map['adminSignIn']) {
    $user = new controller\logController();
    $user->signIn($_POST);
} elseif ($curentRoute == $route->map['adminSignOut']) {
    $user = new controller\logController();
    $user->signOut();
} //категории в админке
elseif ($curentRoute == $route->map['adminCategories']) {
    $page = new controller\categoryController();
    $page->display();
} elseif ($curentRoute == $route->map['adminCategoriesUpdate'] . $id) {
    $page = new controller\categoryController();
    $page->showUpdate($id);
} elseif ($curentRoute == $route->map['adminCategoriesUpdateComplete']) {
    $page = new controller\categoryController();
    $page->makeUpdate($_POST);
} elseif ($curentRoute == $route->map['adminCategoriesUpdateSuccess']) {
    $page = new controller\categoryController();
    $page->display(true);
} elseif ($curentRoute == $route->map['adminCategoriesInsert']) {
    $page = new controller\categoryController();
    $page->showInsert();
} elseif ($curentRoute == $route->map['adminCategoriesInsertComplete']) {
    $page = new controller\categoryController();
    $page->makeInsert($_POST);
} elseif ($curentRoute == $route->map['adminCategoriesInsertSuccess']) {
    $page = new controller\categoryController();
    $page->display(true);
} elseif ($curentRoute == $route->map['adminCategoriesDeleteSuccess']) {
    $page = new controller\categoryController();
    $page->display(true);
} //продукты в админке
elseif ($curentRoute == $route->map['adminProducts']) {
    $page = new controller\productController();
    $page->display();
} elseif ($curentRoute == $route->map['adminProductsUpdate'] . $id) {
    $page = new controller\productController();
    $page->showUpdate($id);
} elseif ($curentRoute == $route->map['adminProductsInsert']) {
    $page = new controller\productController();
    $page->showInsert();
} elseif ($curentRoute == $route->map['adminProductsInsertComplete']) {
    $page = new controller\productController();
    $page->makeInsert($_POST, $_FILES);
} elseif ($curentRoute == $route->map['adminProductsInsertSuccess']) {
    $page = new controller\productController();
    $page->display(true);
} elseif ($curentRoute == $route->map['adminOrders']) {
    $page = new controller\orderController();
    $page->display();
} elseif ($curentRoute == $route->map['adminOrdersUpdate'] . $id) {
    $page = new controller\orderController();
    $page->showUpdate($id);
} elseif ($curentRoute == $route->map['adminOrdersUpdateComplete']) {
    $page = new controller\orderController();
    $page->makeUpdate($_POST);
} elseif ($curentRoute == $route->map['adminOrdersUpdateSuccess']) {
    $page = new controller\orderController();
    $page->display(true);
} elseif ($curentRoute == $route->map['adminReport']) {
    $page = new controller\reportController();
    $page->display();
} elseif ($curentRoute == $route->map['adminReportMake']) {
    $page = new controller\reportController();
    $page->makeReport($_POST);
    //ЦВЕТА
} elseif ($curentRoute == $route->map['adminColors']) {
    $page = new controller\colorsController();
    $page->display();
} elseif ($curentRoute == $route->map['adminColorsUpdate'] . $id) {
    $page = new controller\colorsController();
    $page->showUpdate($id);
} elseif ($curentRoute == $route->map['adminColorsUpdateComplete']) {
    $page = new controller\colorsController();
    $page->makeUpdate($_POST);
} elseif ($curentRoute == $route->map['adminColorsUpdateSuccess']) {
    $page = new controller\colorsController();
    $page->display(true);
} elseif ($curentRoute == $route->map['adminColorsInsert']) {
    $page = new controller\colorsController();
    $page->showInsert();
} elseif ($curentRoute == $route->map['adminColorsInsertComplete']) {
    $page = new controller\colorsController();
    $page->makeInsert($_POST);
} elseif ($curentRoute == $route->map['adminColorsInsertSuccess']) {
    $page = new controller\colorsController();
    $page->display(true);
} elseif ($curentRoute == $route->map['adminColorsDeleteSuccess']) {
    $page = new controller\colorsController();
    $page->display(true);
}
//СТРАНЫ
elseif ($curentRoute == $route->map['adminCountries']) {
    $page = new controller\countryController();
    $page->display();
} elseif ($curentRoute == $route->map['adminCountriesUpdate'] . $id) {
    $page = new controller\countryController();
    $page->showUpdate($id);
} elseif ($curentRoute == $route->map['adminCountriesUpdateComplete']) {
    $page = new controller\countryController();
    $page->makeUpdate($_POST);
} elseif ($curentRoute == $route->map['adminCountriesUpdateSuccess']) {
    $page = new controller\countryController();
    $page->display(true);
} elseif ($curentRoute == $route->map['adminCountriesInsert']) {
    $page = new controller\countryController();
    $page->showInsert();
} elseif ($curentRoute == $route->map['adminCountriesInsertComplete']) {
    $page = new controller\countryController();
    $page->makeInsert($_POST);
} elseif ($curentRoute == $route->map['adminCountriesInsertSuccess']) {
    $page = new controller\countryController();
    $page->display(true);
} elseif ($curentRoute == $route->map['adminCountriesDeleteSuccess']) {
    $page = new controller\countryController();
    $page->display(true);
}
//ЕДИНИЦЫ ИЗМЕРЕНИЯ
elseif ($curentRoute == $route->map['adminUnits']) {
    $page = new controller\unitController();
    $page->display();
} elseif ($curentRoute == $route->map['adminUnitsUpdate'] . $id) {
    $page = new controller\unitController();
    $page->showUpdate($id);
} elseif ($curentRoute == $route->map['adminUnitsUpdateComplete']) {
    $page = new controller\unitController();
    $page->makeUpdate($_POST);
} elseif ($curentRoute == $route->map['adminUnitsUpdateSuccess']) {
    $page = new controller\unitController();
    $page->display(true);
} elseif ($curentRoute == $route->map['adminUnitsInsert']) {
    $page = new controller\unitController();
    $page->showInsert();
} elseif ($curentRoute == $route->map['adminUnitsInsertComplete']) {
    $page = new controller\unitController();
    $page->makeInsert($_POST);
} elseif ($curentRoute == $route->map['adminUnitsInsertSuccess']) {
    $page = new controller\unitController();
    $page->display(true);
} elseif ($curentRoute == $route->map['adminUnitsDeleteSuccess']) {
    $page = new controller\unitController();
    $page->display(true);
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
