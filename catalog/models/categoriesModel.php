<?php


namespace catalog\models;


class categoriesModel extends \catalog\config\config
{
    public function getName()
    {
        $query = "SELECT * FROM `categories`";
        return $this->getPdo()->query($query)->fetchAll();
    }
}