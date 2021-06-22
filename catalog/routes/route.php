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
        "PaymentInfo" => "/agrMachines/account/history/payment-info/",
        "account" => "/agrMachines/account",
        "adminHome"=>"/agrMachines/admin/home",
        "adminAuth"=>"/agrMachines/admin/auth",
        "adminAuthFail"=>"/agrMachines/admin/auth/fail",
        "adminSignIn"=>"/agrMachines/admin/sign-in",
        "adminSignOut"=>"/agrMachines/admin/sign-out",
        //категории
        "adminCategories"=>"/agrMachines/admin/categories",
        "adminCategoriesUpdate"=>"/agrMachines/admin/categories/update/",
        "adminCategoriesUpdateComplete"=>"/agrMachines/admin/categories/update/complete",
        "adminCategoriesUpdateSuccess" => "/agrMachines/admin/categories/update/success",
        "adminCategoriesInsert"=>"/agrMachines/admin/categories/new",
        "adminCategoriesInsertComplete"=>"/agrMachines/admin/categories/new/complete",
        "adminCategoriesInsertSuccess"=>"/agrMachines/admin/categories/new/success",
        "adminCategoriesDeleteComplete"=>"/agrMachines/admin/categories/delete/",
        "adminCategoriesDeleteSuccess"=>"/agrMachines/admin/categories/delete/success",
        //товары
        "adminProducts"=>"/agrMachines/admin/products",
        "adminProductsUpdate"=>"/agrMachines/admin/products/update/",
        "adminProductsUpdateComplete"=>"/agrMachines/admin/products/update/complete",
        "adminProductsUpdateSuccess" => "/agrMachines/admin/products/update/success",
        "adminProductsInsert"=>"/agrMachines/admin/products/new",
        "adminProductsInsertComplete"=>"/agrMachines/admin/products/new/complete",
        "adminProductsInsertSuccess"=>"/agrMachines/admin/products/new/success",
        "adminProductsDeleteComplete"=>"/agrMachines/admin/products/delete/",
        "adminProductsDeleteSuccess"=>"/agrMachines/admin/products/delete/success",
        //Заказы
        "adminOrders" => "/agrMachines/admin/orders",
        "adminOrdersUpdate"=>"/agrMachines/admin/orders/update/",
        "adminOrdersUpdateComplete"=>"/agrMachines/admin/orders/update/complete",
        "adminOrdersUpdateSuccess" => "/agrMachines/admin/orders/update/success",
        "adminReport" => "/agrMachines/admin/report",
        "adminReportMake" => "/agrMachines/admin/report/make",
        //цвета
        "adminColors"=>"/agrMachines/admin/colors",
        "adminColorsUpdate"=>"/agrMachines/admin/colors/update/",
        "adminColorsUpdateComplete"=>"/agrMachines/admin/colors/update/complete",
        "adminColorsUpdateSuccess" => "/agrMachines/admin/colors/update/success",
        "adminColorsInsert"=>"/agrMachines/admin/colors/new",
        "adminColorsInsertComplete"=>"/agrMachines/admin/colors/new/complete",
        "adminColorsInsertSuccess"=>"/agrMachines/admin/colors/new/success",
        "adminColorsDeleteComplete"=>"/agrMachines/admin/colors/delete/",
        "adminColorsDeleteSuccess"=>"/agrMachines/admin/colors/delete/success",
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