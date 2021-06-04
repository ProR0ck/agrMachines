<?php


namespace catalog\controllers;

use catalog\models\productModel as Model;

class homeController
{

    function showPage(){
        include ("catalog/view/template/header.php");
        $products = new Model();
        $productsArrayOnMainPage = $products->getProducts();
        include ("catalog/view/template/products.php");
        include ("catalog/view/template/footer.php");
    }
}


