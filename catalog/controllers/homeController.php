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
        $categories = $category->getName();
        $products = new models\productsModel();
        $productsArrayOnMainPage = $products->getProducts();

        if(isset($_SESSION['basket'])){
            $productsInBasket =[];
            foreach ($_SESSION['basket'] as $id){
                array_push($productsInBasket,$products->getInfo($id));
            }
        }
        else $productsInBasket =[];

        include ("catalog/view/template/header.php");
        include "catalog/view/template/menu.php";
        include ("catalog/view/template/products.php");
        include ("catalog/view/template/footer.php");
    }
}