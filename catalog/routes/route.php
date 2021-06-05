<?php


namespace catalog\routes;


class route
{
    public $map= array(
        "home" => "/agrMachines/",
        "product" => "/agrMachines/model/1/",
        "about" => "/agrMachines/about/"
    );
    public function getRoute(){
        return $_SERVER['REQUEST_URI'];
}
}