<?php


namespace catalog\controllers;

use catalog\models;
require_once "catalog/models/categoriesModel.php";
require_once "catalog/models/productsModel.php";

class productController
{
    function display($id){
        $category = new models\categoriesModel();
        $categories = $category->getName();
        $product = new models\productsModel();
        $productInfo = $product->getInfo($id);
        $productMainPhoto = $product->getMainPhoto($id);
        $productPhotos = $product->getPhotos($id);
        $productAtributes = $product->getAtributes($id);
        $title = $productInfo['mark_name']." ".$productInfo['model_name'];

        include ("catalog/view/template/header.php");
        include "catalog/view/template/menu.php";
        include ("catalog/view/template/productInfo.php");
        include ("catalog/view/template/footer.php");
    }
}