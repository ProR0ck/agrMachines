<?php


namespace catalog\controllers;

use catalog\models;
use catalog\routes;


class userHistoryController
{
    public function display(){

        $category = new models\categoriesModel();
        $product = new models\productsModel();
        $route = new routes\route();
        $basket = new models\basketModel();
        $order = new models\orderModel();

        $link = $route->map['host'];
        $categories = $category->getName();
        $productsArrayOnMainPage = $product->getProducts();
        $productsInBasket = $product->getBasketList();
        $productsInBasketTotalPriceArr = $product->getBasketList(1);
        $totalPrice = $product->getBasketTotalPrice($productsInBasketTotalPriceArr);
        $makeOrder = $basket->isBasket();
        $title = "История заказов";
        $orders = $order->getHistory($_SESSION['id_user']);

        include ("catalog/view/template/header.php");
        include "catalog/view/template/menu.php";
        include("catalog/view/template/history.php");
        include ("catalog/view/template/footer.php");
    }
    public function getPaymentInfo($id_order)
    {
        echo $id_order;
    }
}