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
        "category" => "/agrMachines/category/",
        "product" => "/agrMachines/product/",
        "about" => "/agrMachines/about/",
        "addProductToBasket" =>"/agrMachines/add-to-basket/",
        "deleteProductFromBasket"=>"/agrMachines/delete-from-basket/",
        "added" => "/agrMachines/?added",
        "deleted" => "/agrMachines/deleted/?deleted",
        "search" => "/agrMachines/?search="
    );
    public function getRoute(){
        return urldecode($_SERVER['REQUEST_URI']);
    }
}