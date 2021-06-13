<?php


namespace catalog\routes;
use catalog\config;


class route extends config\config
{
    function __construct(){
        $routeSigmentsArray = explode('/',$this->getRoute());
        if (isset($routeSigmentsArray[3])){
            $this->id = $routeSigmentsArray[3];
        }
        else $this->id = null;
    }

    public $map= array(
        "host" => self::HOST,
        "home" => "/agrMachines/",
        "product" => "/agrMachines/product/",
        "about" => "/agrMachines/about/",
        "addProductToBasket" =>"/agrMachines/add-to-basket/",
        "deleteProductFromBasket"=>"/agrMachines/delete-from-basket/"
    );
    public function getRoute(){
        return $_SERVER['REQUEST_URI'];
    }
}