<?php


namespace catalog\controllers;

use catalog\models;

class basketController
{
    public function addProduct($id){
        if (!isset($_SESSION['basket'])){
            $_SESSION['basket'] = [];
        }
        array_push($_SESSION['basket'],$id);
        print_r($_SESSION['basket']);
        header("Location: http://localhost:8888/agrMachines/");
    }

    public function delete(){
        unset($_SESSION['basket']);
    }
}