<?php


namespace catalog\controllers;
use catalog\models;
use catalog\routes;


class searchController
{
    public function display($search){

        $category = new models\categoriesModel();
        $product = new models\productsModel();
        $route = new routes\route();
        $basket = new models\basketModel();

        $link = $route->map['host'];
        $categories = $category->getName();
        $productsArrayOnMainPage = $product->search($search);
        $productsInBasket = $product->getBasketList();
        $productsInBasketTotalPriceArr = $product->getBasketList(1);
        $totalPrice = $product->getBasketTotalPrice($productsInBasketTotalPriceArr);
        $makeOrder = $basket->isBasket();
        $title = "agrMachines";

        include ("catalog/view/template/header.php");
        include "catalog/view/template/menu.php";
        include ("catalog/view/template/products.php");
        include ("catalog/view/template/footer.php");
    }
}