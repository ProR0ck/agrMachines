<?php


namespace admin\controller;

use admin\models\dashboardModel;
use admin\models\isUserModel;
use catalog\routes;

class homeController extends isUserModel
{
    public function display(){
        $route = new routes\route();
        $info = new dashboardModel();

        $link = $route->map['host'];
        $title = "Панель администратора";
        $orders = $info->getOrderQuantity();
        $sales = $info->getSalesQuantity();
        $customers = $info->getCustomersQuantity();
        $salons = $info->getSalonsQuantity();

        if (!$this->is_admin) header("Location: {$route->map['adminAuth']}");
        else {
            include "admin/view/template/head.php";
            include "admin/view/template/header.php";
            include "admin/view/template/left-menu.php";
            include "admin/view/template/dashboard.php";
            include "admin/view/template/footer.php";
        }
    }
}