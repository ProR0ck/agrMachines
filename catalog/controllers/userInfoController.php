<?php


namespace catalog\controllers;

use catalog\models;
use catalog\routes;


class userInfoController
{
    public function display(){

        $category = new models\categoriesModel();
        $product = new models\productsModel();
        $route = new routes\route();
        $basket = new models\basketModel();
        $link = $route->map['host'];
        $categories = $category->getName();
        $productsArrayOnMainPage = $product->getProducts();
        $productsInBasket = $product->getBasketList();
        $productsInBasketTotalPriceArr = $product->getBasketList(1);
        $totalPrice = $product->getBasketTotalPrice($productsInBasketTotalPriceArr);
        $makeOrder = $basket->isBasket();
        $title = "Кабинет - ".$_SESSION['surname']." ".$_SESSION['user_name']." ".$_SESSION['patronymic'];

        include ("catalog/view/template/header.php");
        include "catalog/view/template/menu.php";
        include("catalog/view/template/register.php");
        include ("catalog/view/template/footer.php");
    }
}