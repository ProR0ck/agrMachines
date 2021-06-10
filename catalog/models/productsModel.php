<?php


namespace catalog\models;
require_once 'catalog/config/config.php';

class productsModel extends \catalog\config\config\config
{
    function getProducts(){
        $query = "SELECT v.`id_vehicle`, c.`category_name`,m.`model_name`, v.`description`, v.`price`, p.`path` 
        FROM `vehicles` v, `models` m, `vehicles_photo` p, `categories` c
        WHERE v.`id_model` = m.`id_model`
        AND v.`id_vehicle` = p.`id_vehicle` 
        AND v.`id_category` = c.`id_category`
        AND p.`is_main` = 1";
        $productArray = $this->getPdo()->query($query)->fetchAll();
        $i = 0;
        foreach ($productArray as $product) {
            $productArray[$i]['description'] = mb_substr($product['description'], 0, 150) . "...";
            $productArray[$i]['category_name'] = mb_substr($product['category_name'], 0, 11);
            $i++;
        }
        return $productArray;
    }

    function getInfo($id){
        $query = "SELECT 
            v.`id_vehicle`, 
            c.`category_name`,
            mr.`mark_name`, 
            m.`model_name`, 
            mn.`manufacturer_name`,
            v.`description`, 
            v.`price`, 
            p.`path`, 
            s.`stock_status_value`, 
            cn.`country_name`
        FROM 
            `vehicles` v, 
            `models` m, 
            `vehicles_photo` p, 
            `categories` c, 
            `marks` mr, 
            `manufacturer` mn, 
            `stock_status` s, 
            `countries` cn
        WHERE v.`id_model` = m.`id_model` 
            AND v.`id_vehicle` = p.`id_vehicle` 
            AND v.`id_category` = c.`id_category`
            AND m.`id_mark` = mr.`id_mark`
            AND v.`id_manufacturer` = mn.`id_manufacturer`
            AND s.`id_stock_status` = v.`id_stock_status`
            AND v.`id_country` = cn.`id_country`
            AND m.`id_model` = {$id}";
        return $this->getPdo()->query($query)->fetch();
    }

    function getMainPhoto($id){
        $query = "SELECT * FROM `vehicles_photo` WHERE `is_main` = '1' AND `id_vehicle` = {$id}";
        return $this->getPdo()->query($query)->fetch();
    }

    function getPhotos($id){
        $query = "SELECT * FROM `vehicles_photo` WHERE `is_main` = '0' AND `id_vehicle` = {$id}";
        return $this->getPdo()->query($query)->fetchAll();
    }

    function getAtributes($id){
        $query = "SELECT a.`attribute_name`, v.`value`, u.`unit_symbol`
        FROM `vehicle_attributes` v
        LEFT JOIN `units` u ON v.`id_unit` = u.`id_unit`
        LEFT JOIN `attribute_list` a ON a.`id_attribute` = v.`id_attribute`
        WHERE v.`id_vehicle` = {$id}";
        return $this->getPdo()->query($query)->fetchAll();
    }
}
