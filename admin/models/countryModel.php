<?php


namespace admin\models;


class countryModel extends \catalog\config\config
{
    public function getCountries(){
        $query = "SELECT `id_country`, `country_name` FROM `countries` WHERE 1";
        return $this->getPdo()->query($query)->fetchAll();
    }

    public function getCountry($id){
        $query = "SELECT `id_country`, `country_name` FROM `countries` WHERE `id_country` = '{$id}'";
        return $this->getPdo()->query($query)->fetch();
    }

    public function updateCountry($data){
        $query = "UPDATE `countries` SET `country_name`='{$data['country_name']}' WHERE `id_country` = '{$data['id_country']}'";
        if ($this->getPdo()->query($query))
            return true;
        else
            return false;
    }

    public function insertCountry($value){
        $query = "INSERT INTO `categories` (`id_category`, `category_name`) VALUES (NULL, '{$value['category_name']}')";
        if ($this->getPdo()->query($query))
            return true;
        else
            return false;
    }

    public function deleteCountry($value){
     foreach ($value as $id){
         $query = "DELETE FROM `countries` WHERE `id_country` = '{$id}'";
         if ($this->getPdo()->query($query))
             $result = true;
         else
             $result = false;
     }
     return $result;
    }

}