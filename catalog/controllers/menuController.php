<?php


namespace catalog\controllers;

use catalog\models;
require_once "catalog/models/categoriesModel.php";

class menuController
{
    public function display(){
        $category = new models\categoriesModel();
        $categories = $category->getCategories();
        include ("catalog/view/template/header.php");
        include "catalog/view/template/menu.php";
    }
}