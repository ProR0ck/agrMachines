<?php


namespace catalog\routes;
use catalog\config;


class route extends config\config
{
    function __construct(){
        $this->id = null;
        $arr = explode('/',$this->getRoute());
        foreach ($arr as $item){
            if (intval($item)) $this->id = $item;
        }
    }
    public $map= array(
        "host" => self::HOST,
        "localhost" => self::LOCALHOST,
        "home" => "/agrMachines/",
        "category" => "/agrMachines/category/",
        "product" => "/agrMachines/product/",
        "about" => "/agrMachines/about/",
        "addProductToBasket" =>"/agrMachines/add-to-basket/",
        "deleteProductFromBasket"=>"/agrMachines/delete-from-basket/",
        "added" => "/agrMachines/?added",
        "deleted" => "/agrMachines/deleted/?deleted",
        "search" => "/agrMachines/?search=",
        "newOrder" => "/agrMachines/new-order/",
        "newOrderComplete" => "/agrMachines/new-order/complete",
        "login" => "/agrMachines/account/login",
        "logChek" => "/agrMachines/account/login-chek",
        "register" => "/agrMachines/account/register",
        "registerChek" => "/agrMachines/account/register-chek",
        "authorization" => "/agrMachines/account/authorization",
        "logout" => "/agrMachines/account/logout",
        "userInfo" => "/agrMachines/account/info",
        "history" => "/agrMachines/account/history",
        "account" => "/agrMachines/account",
        "adminHome"=>"/agrMachines/admin/home",
        "adminAuth"=>"/agrMachines/admin/auth",
        "adminSignIn"=>"/agrMachines/admin/sign-in",
        "adminSignOut"=>"/agrMachines/admin/sign-out",
        "adminCategories"=>"/agrMachines/admin/categories",
        "adminCategoriesUpdate"=>"/agrMachines/admin/categories/update/",
        "adminCategoriesUpdateComplete"=>"/agrMachines/admin/categories/update/complete",
        "adminCategoriesUpdateSuccess" => "/agrMachines/admin/categories/update/success",
    );
    public function getRoute(){
        return urldecode($_SERVER['REQUEST_URI']);
    }

    public function safeExit(){
        if (!(strpos($this->getRoute(),"admin")) && (isset($_SESSION['admin']))){
            session_destroy();
            header("Location: {$this->map['home']}");
        }
    }
}