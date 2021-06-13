<?php


namespace catalog\models;
require_once 'catalog/config/config.php';

class basketModel extends \catalog\config\config
{
    public function getProductInfo($id){
        $query = "";
    }

    public function removeProduct($id){

    }
    public function isBasket(){
        if (count($_SESSION['basket']) > 0){
            return true;
        }
        else return false;
    }
}