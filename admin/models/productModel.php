<?php


namespace admin\models;


class productModel extends \catalog\config\config
{
    public function getProducts(){
        $query = "SELECT v.`id_vehicle`, c.`category_name`,mr.`mark_name`,m.`model_name`, v.`description`, v.`price`,v.`VIN`, p.`path` 
            FROM `vehicles` v, `models` m, `vehicles_photo` p, `categories` c, `marks` mr
            WHERE v.`id_model` = m.`id_model`
            AND v.`id_vehicle` = p.`id_vehicle` 
            AND v.`id_category` = c.`id_category`
            AND m.`id_mark` = mr.`id_mark`
            AND p.`is_main` = 1";
        return $this->getPdo()->query($query)->fetchAll();
    }

    public function getNewProductId(){
        $query = "SELECT MAX(`id_vehicle`) FROM `vehicles`";
        return $this->getPdo()->query($query)->fetch()[0];
    }

    public function getCategory($id = null){
        if ($id){
            $query = "SELECT `id_category`, `category_name` FROM `categories` WHERE `id_category` = '{$id}'";
            return $this->getPdo()->query($query)->fetch();
        }
        else {
            $query = "SELECT `id_category`, `category_name` FROM `categories`";
            return $this->getPdo()->query($query)->fetchAll();
        }

    }

    public function getMarkAndModels($id = null){
        if ($id){

        }
        else {
            $query = "SELECT md.`id_model`, md.`model_name`, mr.`id_mark`, mr.`mark_name` 
            FROM `models` md, `marks` mr 
            WHERE md.`id_mark` = mr.`id_mark`";
            return $this->getPdo()->query($query)->fetchAll();
        }
    }

    public function getManufacturers($id = null){
        if ($id){
            $query = "";
            return $this->getPdo()->query($query)->fetch();
        }
        else {
            $query = "SELECT `id_manufacturer`, `manufacturer_name`, `phone`, `e_mail`, `address` FROM `manufacturer` WHERE 1";
            return $this->getPdo()->query($query)->fetchAll();
        }
}

    public function getCountries($id = null){
        if ($id){
            $query = "";
            return $this->getPdo()->query($query)->fetch();
        }
        else {
            $query = "SELECT `id_country`, `country_name` FROM `countries` WHERE 1";
            return $this->getPdo()->query($query)->fetchAll();
        }
    }

    public function getColors($id = null){
        if ($id){
            $query = "";
            return $this->getPdo()->query($query)->fetch();
        }
        else {
            $query = "SELECT `id_color`, `color_name`, `color_code` FROM `colors` WHERE 1";
            return $this->getPdo()->query($query)->fetchAll();
        }
    }

    public function getSalons($id = null){
        if ($id){
            $query = "";
            return $this->getPdo()->query($query)->fetch();
        }
        else {
            $query = "SELECT `id_salon`, `salon_name`, `salon_address`, `phone_number`, `e_mail` FROM `salons` WHERE 1";
            return $this->getPdo()->query($query)->fetchAll();
        }
    }

    public function getStockStatuses($id = null){
        if ($id){
            $query = "";
            return $this->getPdo()->query($query)->fetch();
        }
        else {
            $query = "SELECT `id_stock_status`, `stock_status_value` FROM `stock_status` WHERE 1";
            return $this->getPdo()->query($query)->fetchAll();
        }
    }

    public function insertProduct($product, $photos)
    {
        $i = 0;
        $is_main = 1;
        $query = "INSERT INTO `vehicles` (
                        `id_vehicle`, 
                        `id_category`, 
                        `id_model`, 
                        `id_manufacturer`, 
                        `id_country`, 
                        `id_color`, 
                        `id_salon`, 
                        `id_stock_status`, 
                        `VIN`, 
                        `description`, 
                        `price`) 
                        VALUES (
                                NULL, 
                                '{$product['id_category']}', 
                                '{$product['id_model']}', 
                                '{$product['id_manufacturer']}', 
                                '{$product['id_country']}', 
                                '{$product['id_color']}', 
                                '{$product['id_salon']}', 
                                '{$product['id_stock_status']}', 
                                '{$product['VIN']}', 
                                '{$product['description']}', 
                                '{$product['price']}')";
        if ($this->getPdo()->query($query))
        {
            $id_vehicle = $this->getNewProductId();
            foreach ($photos as $photo)
            {
                $i = 0;
                $is_main = 1;
                while ($i < count($photo['name']))
                {
                    move_uploaded_file($photo['tmp_name'][$i],"catalog/view/image/".$photo['name'][$i]);
                    $query = "INSERT INTO `vehicles_photo` (`id_vehicle`, `path`, `is_main`) 
                    VALUES ('{$id_vehicle}', '{$photo['name'][$i]}', '{$is_main}')";
                    $this->getPdo()->query($query);
                    $is_main = 0;
                    $i++;
                }
                return true;
            }
        }
        else
            return false;
        //echo "<pre>";print_r($product);echo "</pre>";
        //echo "<pre>";print_r($_FILES);echo "</pre>";
    }

}