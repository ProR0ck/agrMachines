<?php


namespace catalog\controllers;

use catalog\models\productModel;
require_once ("catalog/model/productModel.php");

class homeController
{

    function showPage(){
        include ("catalog/view/template/header.php");
        $products = new productModel();
        $productsArrayOnMainPage = $products->getProducts();
        include ("catalog/view/template/products.php");
        include ("catalog/view/template/footer.php");
    }
}


