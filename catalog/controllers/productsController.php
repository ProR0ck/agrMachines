<?php


namespace catalog\controllers;

use catalog\models;
require_once "catalog/models/productsModel.php";

class productsController
{
    function display($id = null){
        if (!$id){
            $products = new models\productsModel();
            $productsArrayOnMainPage = $products->getProducts();
            include ("catalog/view/template/products.php");
        }
        else{
            $products = new models\productsModel();
            $productsArrayOnMainPage = $products->getProducts();
            include ("catalog/view/template/products.php");
        }
    }
}