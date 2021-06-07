<?php


namespace catalog\models;
require_once 'catalog/config/config.php';

class productsModel extends \catalog\config\config\config
{
    function getProducts()
    {
        $query = "SELECT v.`id_vehicle`, c.`category_name`,m.`model_name`, v.`description`, v.`price`, p.`path` 
        FROM `vehicles` v, `models` m, `vehicles_photo` p, `categories` c
        WHERE v.`id_model` = m.`id_model` AND v.`id_vehicle` = p.`id_vehicle` AND v.`id_category` = c.`id_category`";
        $productArray = $this->getPdo()->query($query)->fetchAll();
        $i = 0;
        foreach ($productArray as $product) {
            $productArray[$i]['description'] = mb_substr($product['description'], 0, 150) . "...";
            $productArray[$i]['category_name'] = mb_substr($product['category_name'], 0, 11);
            $i++;
        }
        return $productArray;
    }
    function ggetProductsId($id){
        $query = "";
    }
}
