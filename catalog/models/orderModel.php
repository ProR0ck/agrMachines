<?php


namespace catalog\models;
use catalog\routes;


class orderModel extends \catalog\config\config
{
    public function getPaymentMethods(){
        $query = "SELECT * FROM `payment_methods`";
        return $this->getPdo()->query($query)->fetchAll();
    }
    public function getDeliveryMethods(){
        $query = "SELECT * FROM `delivery_methods`";
        return $this->getPdo()->query($query)->fetchAll();
    }
    public function insert($data, $products){
        date_default_timezone_set("Europe/Moscow");
        $dateTime = date("Y-m-d H:i:s");
        $query = "INSERT INTO `orders` (`id_order`, `time_date_of_order`, `id_client`, `id_staff`, `id_status`, `id_payment_method`, `id_delivery_method`, `delivery_address`) 
                  VALUES (NULL, '{$dateTime}', '{$_SESSION['id_user']}', NULL, '1', '{$data['id_payment_method']}', '{$data['id_delivery_method']}', '{$data['address']}')";
        if ($this->getPdo()->query($query)){
            $id = $this->getNewOrderId();
            foreach ($products as $product){
                $query = "INSERT INTO `goods_in_basket_order` (`id_order`, `id_vehicle`) VALUES ('{$id}', '{$product['id_vehicle']}')";
                $this->getPdo()->query($query);
            }
        }
        unset($_SESSION['basket']);
    }
    public function getNewOrderId(){
        $query = "SELECT MAX(`id_order`) FROM `orders`";
        return $this->getPdo()->query($query)->fetch()[0];
    }
}