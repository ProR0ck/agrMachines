<?php


namespace catalog\controllers;

use catalog\models;
require_once "catalog/models/categoriesModel.php";
require_once "catalog/models/productsModel.php";

class homeController
{
    public function display(){
        $title = "agrMachines";
        $category = new models\categoriesModel();
        $categories = $category->getCategories();
        $products = new models\productsModel();
        $productsArrayOnMainPage = $products->getProducts();
        include ("catalog/view/template/header.php");
        include "catalog/view/template/menu.php";
        include ("catalog/view/template/products.php");
        include ("catalog/view/template/footer.php");
    }
}