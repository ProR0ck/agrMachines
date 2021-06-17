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

    public function getCategory($id){
        $query = "SELECT `id_category`, `category_name` FROM `categories` WHERE `id_category` = '{$id}'";
        return $this->getPdo()->query($query)->fetch();
    }

    public function updateCategory($data){
        $query = "UPDATE `categories` SET `category_name`='{$data['category_name']}' WHERE `id_category` = '{$data['id_category']}'";
        if ($this->getPdo()->query($query))
            return true;
        else
            return false;
    }

    public function insertCategory($value){
        $query = "INSERT INTO `categories` (`id_category`, `category_name`) VALUES (NULL, '{$value['category_name']}')";
        if ($this->getPdo()->query($query))
            return true;
        else
            return false;
    }

    public function deleteCategory($value){
        foreach ($value as $id){
            $query = "DELETE FROM `categories` WHERE `id_category` = '{$id}'";
            if ($this->getPdo()->query($query))
                $result = true;
            else
                $result = false;
        }
        return $result;
    }

}