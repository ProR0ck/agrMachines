<?php


namespace catalog\controllers;

use catalog\models;
require_once "catalog/models/productsModel.php";

class productController
{
    function display($id){
            $products = new models\productsModel();
            $productsArrayOnMainPage = $products->getProducts();
            include ("catalog/view/template/products.php");
    }
}