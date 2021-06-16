<?php


namespace admin\controller;

use admin\models\isUserModel;
use admin\models\logModel;
use catalog\routes;


class logController extends isUserModel
{
    public function display(){
        $route = new routes\route();
        $link = $route->map['host'];
        $title = "Авторизация";
        if (!$this->is_admin){
            include "admin/view/template/head.php";
            include "admin/view/template/auth.php";
            include "admin/view/template/footer.php";
        }
        else header("Location: {$route->map['adminHome']}");
    }
    public function signIn($data){
        $route = new routes\route();
        $user = new logModel();
        if ($user->chekUser($data)){
            header("Location: {$route->map['adminHome']}");
        }
        else {
            header("Location: {$route->map['adminAuth']}");
        }
    }
    public function signOut(){
        $route = new routes\route();
        $user = new logModel();
        session_destroy();
        header("Location: {$route->map['adminAuth']}");
    }
}