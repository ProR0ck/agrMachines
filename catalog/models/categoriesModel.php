<?php


namespace catalog\models;


class categoriesModel extends \catalog\config\config
{
    public function getName($id = null)
    {
        if (isset($id)){
            $query = "SELECT `category_name` FROM `categories` WHERE `id_category` = '{$id}'";
            return $this->getPdo()->query($query)->fetch()[0];
        }
        else {
            $query = "SELECT * FROM `categories` ORDER BY `categories`.`id_category` ASC";
            return $this->getPdo()->query($query)->fetchAll();
        }
    }
}