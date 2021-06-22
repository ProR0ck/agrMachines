<?php


namespace catalog\controllers;

use catalog\models;
use catalog\routes;

class registerController
{
    public function register($data)
    {

        $category = new models\categoriesModel();
        $product = new models\productsModel();
        $route = new routes\route();
        $basket = new models\basketModel();
        $chek = new models\registerModel();
        $user = new models\loginModel();

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
        $passwordError = $chek->coincidence($data['password'], $data['confirm']);
        include("catalog/view/template/header.php");
        include "catalog/view/template/menu.php";
        if (($nameError == null) && ($surnameError == null) && ($patronymicError == null) && ($passwordError == null)) {
            if ($data['flag'] == 'insert') {
                $result = $chek->insert($data);
                include "catalog/view/template/login.php";
            } elseif ($data['flag'] == 'update') {
                $updateResult = $chek->update($data);
                $user->login($data['e_mail'], $data['password']);
                include "catalog/view/template/register.php";
            }
        } else {
            include "catalog/view/template/register.php";
        }
        include("catalog/view/template/footer.php");
    }

}