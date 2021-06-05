<?php


namespace catalog\controllers;

use catalog\models\productsModel;
require_once "catalog/model/productsModel.php";

class indexController
{
    function showPage(){
        include ("catalog/view/template/header.php");
        $products = new productsModel\productsModel();
        $productsArrayOnMainPage = $products->getProducts();
        include ("catalog/view/template/products.php");
        include ("catalog/view/template/footer.php");
    }
}
