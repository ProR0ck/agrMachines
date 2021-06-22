<?php


namespace catalog\models;


class productsModel extends \catalog\config\config
{
    function getProducts($category = null)
    {
        if (!$category)
            $query = "SELECT v.`id_vehicle`, c.`category_name`,cn.`country_name`, mn.`manufacturer_name`,mr.`mark_name`,m.`model_name`, v.`description`, v.`price`,v.`VIN`, p.`path`,cl.`color_code`,
            cl.`color_name` 
            FROM `vehicles` v, `models` m, `vehicles_photo` p, `categories` c, `marks` mr, `countries` cn,`manufacturer` mn, `colors` cl
            WHERE v.`id_model` = m.`id_model`
            AND v.`id_vehicle` = p.`id_vehicle` 
            AND v.`id_category` = c.`id_category`
            AND mr.`id_mark` = m.`id_mark`
            AND v.`id_country` = cn.`id_country`
            AND v.`id_color` = cl.`id_color`
            AND mn.`id_manufacturer` = v.`id_manufacturer`
            AND p.`is_main` = 1";
        else
            $query = "SELECT v.`id_vehicle`, c.`category_name`,cn.`country_name`, mn.`manufacturer_name`,mr.`mark_name`,m.`model_name`, v.`description`, v.`price`,v.`VIN`, p.`path`,cl.`color_code`,
            cl.`color_name` 
            FROM `vehicles` v, `models` m, `vehicles_photo` p, `categories` c, `marks` mr, `countries` cn,`manufacturer` mn, `colors` cl
            WHERE v.`id_model` = m.`id_model`
            AND v.`id_vehicle` = p.`id_vehicle` 
            AND v.`id_category` = c.`id_category`
            AND mr.`id_mark` = m.`id_mark`
            AND v.`id_country` = cn.`id_country`
            AND v.`id_color` = cl.`id_color`
            AND mn.`id_manufacturer` = v.`id_manufacturer`
            AND p.`is_main` = 1
            AND v.`id_category` = '{$category}'";
        $productArray = $this->getPdo()->query($query)->fetchAll();
        $i = 0;
        foreach ($productArray as $product) {
            $productArray[$i]['description'] = mb_substr($product['description'], 0, 100) . "...";
            $productArray[$i]['category_name'] = mb_substr($product['category_name'], 0, 11);
            $productArray[$i]['price'] = number_format($productArray[$i]['price'], 2, ',', ' ') . " руб.";
            $i++;
        }
        return $productArray;
    }

    function getInfo($id, $calc = null)
    {
        $query = "SELECT 
            v.`id_vehicle`, 
            c.`category_name`,
            c.`id_category`,
            mr.`mark_name`, 
            m.`model_name`, 
            mn.`manufacturer_name`,
            v.`description`, 
            v.`price`,
            v.`VIN`, 
            p.`path`, 
            s.`stock_status_value`, 
            cn.`country_name`, 
            cl.`color_code`,
            cl.`color_name`
        FROM 
            `vehicles` v, 
            `models` m, 
            `vehicles_photo` p, 
            `categories` c, 
            `marks` mr, 
            `manufacturer` mn, 
            `stock_status` s, 
            `countries` cn, 
             `colors` cl
        WHERE v.`id_model` = m.`id_model` 
            AND v.`id_vehicle` = p.`id_vehicle` 
            AND v.`id_category` = c.`id_category`
            AND m.`id_mark` = mr.`id_mark`
            AND v.`id_manufacturer` = mn.`id_manufacturer`
            AND s.`id_stock_status` = v.`id_stock_status`
            AND v.`id_country` = cn.`id_country`
            AND v.`id_color` = cl.`id_color`
            AND v.`id_vehicle` = '{$id}'";

        if (isset($calc)) {
            return $this->getPdo()->query($query)->fetch();
        } else {
            $product = $this->getPdo()->query($query)->fetch();
            $product['price'] = number_format($product['price'], 2, ',', ' ') . " руб.";
            return $product;
        }
    }

    function getMainPhoto($id)
    {
        $query = "SELECT * FROM `vehicles_photo` WHERE `is_main` = '1' AND `id_vehicle` = {$id}";
        return $this->getPdo()->query($query)->fetch();
    }

    function getPhotos($id)
    {
        $query = "SELECT * FROM `vehicles_photo` WHERE `is_main` = '0' AND `id_vehicle` = {$id}";
        return $this->getPdo()->query($query)->fetchAll();
    }

    function getAtributes($id)
    {
        $query = "SELECT a.`attribute_name`, v.`value`, u.`unit_symbol`
        FROM `vehicle_attributes` v
        LEFT JOIN `units` u ON v.`id_unit` = u.`id_unit`
        LEFT JOIN `attribute_list` a ON a.`id_attribute` = v.`id_attribute`
        WHERE v.`id_vehicle` = {$id}";
        return $this->getPdo()->query($query)->fetchAll();
    }

    function getBasketList($calc = null)
    {
        if (isset($_SESSION['basket'])) {
            $productsInBasket = [];
            if (isset($calc)) {
                foreach ($_SESSION['basket'] as $id) {
                    array_push($productsInBasket, $this->getInfo($id, 1));
                }
            } else {
                foreach ($_SESSION['basket'] as $id) {
                    array_push($productsInBasket, $this->getInfo($id));
                }
            }
        } else $productsInBasket = [];
        return $productsInBasket;
    }

    function getBasketTotalPrice($productsInBasket)
    {
        $totalPrice = 0;
        //echo "<pre>"; print_r($productsInBasket); echo "</pre>";
        foreach ($productsInBasket as $product) {
            $totalPrice += $product['price'];
        }
        return $totalPrice = number_format($totalPrice, 2, ',', ' ') . " руб.";;
    }

    function search($search)
    {
        $query = "SELECT v.`id_vehicle`, c.`category_name`,m.`model_name`, mr.`mark_name`, v.`description`, v.`price`,v.`VIN`, p.`path`, cl.`color_name`, cl.`color_code` 
            FROM `vehicles` v, `models` m, `vehicles_photo` p, `categories` c, `marks` mr, `colors` cl
            WHERE v.`id_model` = m.`id_model`
            AND v.`id_vehicle` = p.`id_vehicle` 
            AND v.`id_category` = c.`id_category`
            AND p.`is_main` = 1
            AND m.`id_mark` = mr.`id_mark`
            AND v.`id_color` = cl.`id_color`  
            AND (c.`category_name` LIKE '%$search%'
                OR m.`model_name` LIKE '%$search%')";
        $productArray = $this->getPdo()->query($query)->fetchAll();
        $i = 0;
        foreach ($productArray as $product) {
            $productArray[$i]['description'] = mb_substr($product['description'], 0, 100) . "...";
            $productArray[$i]['category_name'] = mb_substr($product['category_name'], 0, 11);
            $productArray[$i]['price'] = number_format($productArray[$i]['price'], 2, ',', ' ') . " руб.";
            $i++;
        }
        return $productArray;
    }
}
