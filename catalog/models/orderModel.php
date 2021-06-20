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
    public function getHistory($id_client,$id_order = null){
        if(!$id_order){
            $query = "SELECT o.`id_order`, o.`time_date_of_order` AS 'date', o.`time_date_of_order` AS 'time', d.`delivery_method_name`, p.`payment_method_name`, o.`delivery_address`
            FROM `orders` o, `delivery_methods` d, `payment_methods` p
            WHERE o.`id_payment_method` = p.`id_payment_method`
            AND o.`id_delivery_method` = d.`id_delivery_method`
            AND o.`id_client` = '{$id_client}'
            ORDER BY `o`.`id_order` DESC";
        }
        elseif ($id_order){
            $query = "SELECT o.`id_order`, o.`time_date_of_order` AS 'date', o.`time_date_of_order` AS 'time', d.`delivery_method_name`, p.`payment_method_name`, o.`delivery_address`
            FROM `orders` o, `delivery_methods` d, `payment_methods` p
            WHERE o.`id_payment_method` = p.`id_payment_method`
            AND o.`id_delivery_method` = d.`id_delivery_method`
            AND o.`id_client` = '{$id_client}'
            AND o.`id_order` = '{$id_order}'
            ORDER BY `o`.`id_order` DESC";
        }

        $data = $this->getPdo()->query($query)->fetchAll();
        $i=0;
        foreach ($data as $value){
            $curentDate = date_create($value['date']);
            $curentTime = date_create($value['time']);

            $data[$i]['date'] = date_format($curentDate, 'd.m.Y');
            $data[$i]['time'] = date_format($curentDate, 'H:i');
            $i++;
        }
        return $data;
    }
    public function getBasketProducts($id){
        $query = "SELECT g.`id_order`, g.`id_vehicle`, mr.`mark_name`, md.`model_name`, v.`VIN`, v.`price`
        FROM `vehicles` v, `marks` mr, `models` md, `goods_in_basket_order` g
        WHERE g.`id_vehicle` = v.`id_vehicle`
        AND md.`id_model` = v.`id_model`
        AND md.`id_mark` = mr.`id_mark`
        AND v.`id_vehicle` = g.`id_vehicle`
        AND g.`id_order` = '{$id}'";
        return $this->getPdo()->query($query)->fetchAll();
    }
    public function getTotalPrice($id){
        $totalPrice = 0;
        $products  = $this->getBasketProducts($id);
        foreach ($products as $product){
            $totalPrice += $product['price'];
        }
        return number_format($totalPrice, 2, ',', ' ');
    }
    public function makePaymentDoc($id_client, $id_order){
        $order_data = $this->getHistory($id_client,$id_order)[0];
        $basket_list = $this->getBasketProducts($id_order);
        $i=0;
        foreach ($basket_list as $product){
            $basket_list[$i]['price'] = number_format($product['price'], 2, ',', ' ')." руб.";
            $i++;
        }
        $tota_price = $this->getTotalPrice($id_order);
        $word = new \PhpOffice\PhpWord\PhpWord();
        $template = new \PhpOffice\PhpWord\TemplateProcessor('catalog/view/paymentDocs/Template.docx');
        $template->setValue('id_order', "{$id_order}");
        $template->setValue('date', "{$order_data['date']}");
        $template->setValue('time', "{$order_data['time']}");
        $template->setValue('totalPrice', "{$tota_price}");
        $template->cloneRowAndSetValues('VIN', $basket_list);
        $template->saveAs("catalog/view/paymentDocs/ЧЕК-{$id_order}.docx");
    }

}