<?php


namespace catalog\controllers;

use catalog\models;
use catalog\routes;


class orderController
{
    public function display($data = null){

        $category = new models\categoriesModel();
        $product = new models\productsModel();
        $route = new routes\route();
        $basket = new models\basketModel();
        $order = new models\orderModel();

        $link = $route->map['host'];
        $categories = $category->getName();
        $productsInBasket = $product->getBasketList();
        $productsInBasketTotalPriceArr = $product->getBasketList(1);
        $totalPrice = $product->getBasketTotalPrice($productsInBasketTotalPriceArr);
        $makeOrder = $basket->isBasket();
        $paymentMethods = $order->getPaymentMethods();
        $deliveryMethods = $order->getDeliveryMethods();
        $title = "Оформление заказа";

        //если не залогинен
        if (!isset($_SESSION['log'])) {
            include "catalog/view/template/header.php";
            include "catalog/view/template/menu.php";
            include "catalog/view/template/login.php";
        }
        //если залогинен но не указал детали заказа
        elseif (isset($_SESSION['log']) && !isset($data)) {
            include "catalog/view/template/header.php";
            include "catalog/view/template/menu.php";
            include "catalog/view/template/order.php";
        }
        //если залогинен и указал детали заказа
        elseif ($data) {
            $order->insert($data,$productsInBasket);
            $productsInBasket = $product->getBasketList();
            $productsInBasketTotalPriceArr = $product->getBasketList(1);
            $totalPrice = $product->getBasketTotalPrice($productsInBasketTotalPriceArr);
            $makeOrder = $basket->isBasket();
            $title = "Заказ принят на обработку! <a href='{$route->map['history']}'>Историю покупок </a> можно посмотреть в личном кабинете!";
            $success = $title;
            include "catalog/view/template/header.php";
            include "catalog/view/template/menu.php";
            include "catalog/view/template/order.php";
        }
        include ("catalog/view/template/footer.php");
        $order->makePaymentDoc($_SESSION['id_user'],$order->getNewOrderId());
    }
}