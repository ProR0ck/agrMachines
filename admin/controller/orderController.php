<?php


namespace admin\controller;
use admin\models\categoryModel;
use admin\models\orderModel;
use catalog\routes;


class orderController extends \admin\models\isUserModel
{
    public function show($title, $flag, $oldStatus = null, $success = null){
        $orders = new orderModel();
        $ordersList = $orders->getOrders();
        $statusList = $orders->getStatus();
        $link = $this->map['host'];
        include "admin/view/template/head.php";
        include "admin/view/template/header.php";
        include "admin/view/template/left-menu.php";
        include "admin/view/template/orders.php";
        include "admin/view/template/footer.php";
    }
    public function display($success = null){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $this->show("Заказы ",(__FUNCTION__),null,$success);
        }
    }
    public function showUpdate($id){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $order = new orderModel();
            $oldStatus = $order->getStatus($id);
            $this->show("Изменение статуса заказа",(__FUNCTION__),$oldStatus);
        }
    }
    public function makeUpdate($data){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $order = new orderModel();
            $order->updateStatus($data);
            header("Location: {$this->map['adminOrdersUpdateSuccess']}");
        }
    }
}