<?php
require_once ("connect_db.php");

function getProductsOnMainPage()
{
    $query = "SELECT v.`id_vehicle`, c.`category_name`,m.`model_name`, v.`description`, v.`price`, p.`path` 
FROM `vehicles` v, `models` m, `vehicles_photo` p, `categories` c
WHERE v.`id_model` = m.`id_model` AND v.`id_vehicle` = p.`id_vehicle` AND v.`id_category` = c.`id_category`";
    $productArray = $GLOBALS['pdo']->query($query)->fetchAll();
    $i=0;
    foreach ($productArray as $product){
        $productArray[$i]['description'] = mb_substr($product['description'], 0, 150)."...";
        $productArray[$i]['category_name'] = mb_substr($product['category_name'], 0, 11);
        $i++;
    }
    return $productArray;
}

