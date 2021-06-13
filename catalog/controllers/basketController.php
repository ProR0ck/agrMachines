<?php


namespace catalog\controllers;

use catalog\models;
use catalog\routes;


class basketController
{
    public function addProduct($id){
        if (!isset($_SESSION['basket'])){
            $_SESSION['basket'] = [];
        }
        array_push($_SESSION['basket'],$id);
        $_SESSION['basket'] = array_unique($_SESSION['basket']);
        $route = new routes\route();
        header("Location: {$route->map['home']}");
    }

    public function deleteProduct($id){
        unset($_SESSION['basket'][array_search($id,$_SESSION['basket'])]);
        $route = new routes\route();
        header("Location: {$route->map['home']}");
    }
}