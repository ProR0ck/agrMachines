<?php


namespace catalog\controllers;

use catalog\models;
use catalog\routes;

class loginController
{
    public function login($data)
    {
        $category = new models\categoriesModel();
        $product = new models\productsModel();
        $route = new routes\route();
        $basket = new models\basketModel();
        $chek = new models\loginModel();

        $link = $route->map['host'];
        $categories = $category->getName();
        $productsArrayOnMainPage = $product->getProducts();
        $productsInBasket = $product->getBasketList();
        $productsInBasketTotalPriceArr = $product->getBasketList(1);
        $totalPrice = $product->getBasketTotalPrice($productsInBasketTotalPriceArr);
        $makeOrder = $basket->isBasket();
        $title = "Авторизация";
        $result = $chek->login($data['log'],$data['pass']);
        include("catalog/view/template/header.php");
        include "catalog/view/template/menu.php";
        if ($result) include "catalog/view/template/register.php";
        else include "catalog/view/template/login.php";
        include("catalog/view/template/footer.php");
    }
    public function logout(){
        $user = new models\loginModel();
        $route = new routes\route();
        $user->logout();
        header("Location: {$route->map['home']}");
    }
}