<?php


namespace admin\controller;
use admin\models\categoryModel;
use admin\models\dashboardModel;
use admin\models\orderModel;
use catalog\routes;


class reportController extends \admin\models\isUserModel
{
    public function show($title, $flag, $reportData = null, $PostData=null, $ordersQuantity=null, $success = null){
        $orders = new orderModel();
        if (isset($reportData)){
            $totalPriceReport = $orders->getReportTotalPrice($reportData);
            $reportLink = $orders->makePaymentDoc($reportData, $totalPriceReport, $ordersQuantity, $PostData);
        }
        $link = $this->map['host'];
        include "admin/view/template/head.php";
        include "admin/view/template/header.php";
        include "admin/view/template/left-menu.php";
        include "admin/view/template/report.php";
        include "admin/view/template/footer.php";
    }
    public function display($success = null){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $this->show("Отчет по продажам ",(__FUNCTION__),null,$success);
        }
    }
    public function makeReport($data){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $order = new orderModel();
            $reportData = $order->getReport($data['start'],$data['end']);
            $ordersQuantity = $order->getSalesQuantity($data['start'],$data['end']);
            $this->show("Отчет по продажам ",(__FUNCTION__), $reportData, $data,$ordersQuantity,true);
        }
    }
}