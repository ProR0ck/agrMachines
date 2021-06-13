<?php


namespace catalog\controllers;

use catalog\models;
use catalog\routes;


class productController
{
    function display($id){

        $category = new models\categoriesModel();
        $product = new models\productsModel();
        $route = new routes\route();
        $basket = new models\basketModel();

        $link = $route->map['host'];
        $categories = $category->getName();
        $productInfo = $product->getInfo($id);
        $productMainPhoto = $product->getMainPhoto($id);
        $productPhotos = $product->getPhotos($id);
        $productAtributes = $product->getAtributes($id);
        $productsInBasket = $product->getBasketList();
        $productsInBasketTotalPriceArr = $product->getBasketList(1);
        $totalPrice = $product->getBasketTotalPrice($productsInBasketTotalPriceArr);
        $makeOrder = $basket->isBasket();
        $title = $productInfo['mark_name']." ".$productInfo['model_name'];

        include ("catalog/view/template/header.php");
        include "catalog/view/template/menu.php";
        include ("catalog/view/template/productInfo.php");
        include ("catalog/view/template/footer.php");
    }
}