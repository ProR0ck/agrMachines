<?php


namespace admin\models;


class dashboardModel extends \catalog\config\config
{
    public function getOrderQuantity(){
        $query = "SELECT COUNT(`id_order`) FROM `orders`";
        return $this->getPdo()->query($query)->fetch()[0];
    }
    public function getSalesQuantity(){
        $query = "SELECT COUNT(`id_order`) FROM `orders` WHERE `id_status` = '5'";
        return $this->getPdo()->query($query)->fetch()[0];
    }
    public function getCustomersQuantity(){
        $query = "SELECT COUNT(`id_user`) FROM `users` WHERE `id_role` = '2'";
        return $this->getPdo()->query($query)->fetch()[0];
    }
    public function getSalonsQuantity(){
        $query = "SELECT COUNT(`id_salon`) FROM `salons`";
        return $this->getPdo()->query($query)->fetch()[0];
    }
}