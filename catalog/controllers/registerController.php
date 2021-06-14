<?php


namespace catalog\controllers;

use catalog\models;
use catalog\routes;

class registerController
{
    public function display($data)
    {

        $category = new models\categoriesModel();
        $product = new models\productsModel();
        $route = new routes\route();
        $basket = new models\basketModel();
        $chek = new models\registerModel();

        $link = $route->map['host'];
        $categories = $category->getName();
        $productsArrayOnMainPage = $product->getProducts();
        $productsInBasket = $product->getBasketList();
        $productsInBasketTotalPriceArr = $product->getBasketList(1);
        $totalPrice = $product->getBasketTotalPrice($productsInBasketTotalPriceArr);
        $makeOrder = $basket->isBasket();
        $title = "Регистрация";

        $nameError = $chek->fullName($data['name']);
        $surnameError = $chek->fullName($data['surname']);
        $patronymicError = $chek->fullName($data['patronymic']);
        $passwordError = $chek->coincidence($data['password'],$data['confirm']);

        include("catalog/view/template/header.php");
        include "catalog/view/template/menu.php";
        if (($nameError == null) && ($surnameError == null) && ($patronymicError == null) && ($passwordError == null)){
            $chek->enterInDb($data);
            include "catalog/view/template/login.php";
        }
        else include("catalog/view/template/register.php");
        include("catalog/view/template/footer.php");
    }
}