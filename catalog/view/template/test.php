<?php
include_once('../../controllers/controller.php');
$productArr = getProductsOnMainPage();
foreach ($productArr as $product)
{
    echo $product['id_vehicle'];
}