<?php


namespace admin\models;


class categoryModel extends \catalog\config\config
{
    public function getCategories(){
        $query = "SELECT * FROM `categories`";
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