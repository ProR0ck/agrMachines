<?php


namespace catalog\controllers;

use catalog\models;
require_once "catalog/models/productsModel.php";

class indexController
{
    function showPage(){
        include ("catalog/view/template/header.php");
        $products = new models\productsModel();
        $productsArrayOnMainPage = $products->getProducts();
        include ("catalog/view/template/products.php");
        include ("catalog/view/template/footer.php");
    }
}