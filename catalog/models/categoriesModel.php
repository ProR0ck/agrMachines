<?php


namespace catalog\models;
require_once 'catalog/config/config.php';

class categoriesModel extends \catalog\config\config\config
{
    public function getCategories()
    {
        $query = "SELECT * FROM `categories`";
        return $this->getPdo()->query($query)->fetchAll();
    }
}