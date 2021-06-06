<?php


namespace catalog\routes;


class route
{
    function __construct(){
        $routeSigmentsArray = explode('/',$this->getRoute());
        if (isset($routeSigmentsArray[3])){
            $this->id = $routeSigmentsArray[3];
        }
        else $this->id = null;
    }
    public $map= array(
        "home" => "/agrMachines/",
        "product" => "/agrMachines/product/",
        "about" => "/agrMachines/about/"
    );
    public function getRoute(){
        return $_SERVER['REQUEST_URI'];
    }
}