<?php require_once ("../model/model.php");
include ("../view/template/header.php");
//Вывод продуктов на главной
$productsArrayOnMainPage = getProductsOnMainPage();

include ("../view/template/products.php");
include ("../view/template/footer.php");


