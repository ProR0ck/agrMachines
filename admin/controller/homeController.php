<?php


namespace admin\controller;

use admin\models\isUserModel;
use catalog\routes;

class homeController extends isUserModel
{
    public function display(){
        $route = new routes\route();
        $link = $route->map['host'];
        //if ($this->is_admin)
        //include "admin/view/template/test.php";
        include "admin/view/template/head.php";
        include "admin/view/template/header.php";
        include "admin/view/template/left-menu.php";
        include "admin/view/template/content.php";
        //include "admin/view/template/auth.php";
        include "admin/view/template/footer.php";


    }
}