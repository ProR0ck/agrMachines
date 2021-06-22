<?php


namespace admin\models;


class orderModel extends \catalog\config\config
{
    public function getOrders(){
        $query = "SELECT o.`id_order`, o.`time_date_of_order` AS 'date', o.`time_date_of_order` AS 'time', d.`delivery_method_name`, p.`payment_method_name`, o.`delivery_address`, o.`id_client`, cl.`surname`, cl.`name`, cl.`patronymic`, cl.`e_mail`, cl.`phone_number`, o.`id_status`, os.`status_name`
            FROM `orders` o, `delivery_methods` d, `payment_methods` p, `users` cl, `order_statuses` os
            WHERE o.`id_payment_method` = p.`id_payment_method`
            AND o.`id_delivery_method` = d.`id_delivery_method`
            AND o.`id_status` = os.`id_status`
            AND o.`id_client` = cl.`id_user`
            ORDER BY `o`.`id_order` DESC";
        $data = $this->getPdo()->query($query)->fetchAll();
        $i = 0;
        foreach ($data as $value) {
            $curentDate = date_create($value['date']);
            $curentTime = date_create($value['time']);

            $data[$i]['date'] = date_format($curentDate, 'd.m.Y');
            $data[$i]['time'] = date_format($curentDate, 'H:i');
            $data[$i]['name'] = mb_substr($data[$i]['name'],0,1).".";
            $data[$i]['patronymic'] = mb_substr($data[$i]['patronymic'],0,1).".";
            $i++;
        }
        return $data;
    }

    public function getBasketProducts($id)
    {
        $query = "SELECT g.`id_order`, g.`id_vehicle`, mr.`mark_name`, md.`model_name`, v.`VIN`, v.`price`
        FROM `vehicles` v, `marks` mr, `models` md, `goods_in_basket_order` g
        WHERE g.`id_vehicle` = v.`id_vehicle`
        AND md.`id_model` = v.`id_model`
        AND md.`id_mark` = mr.`id_mark`
        AND v.`id_vehicle` = g.`id_vehicle`
        AND g.`id_order` = '{$id}'";

        return $this->getPdo()->query($query)->fetchAll();
    }

    public function getTotalPrice($id, $calc = null)
    {
        $totalPrice = 0;
        $products = $this->getBasketProducts($id);
        foreach ($products as $product) {
            $totalPrice += $product['price'];
        }
        if (!$calc)
            return number_format($totalPrice, 2, ',', ' ');
        else
            return $totalPrice;
    }

    public function getStatus($id_order = null){
        if ($id_order){
            $query = "SELECT o.`id_order`, st.`status_name`, st.`id_status` FROM `order_statuses` st, `orders` o
            WHERE o.`id_status` = st.`id_status`
            AND o.`id_order` = '{$id_order}'";
            return $this->getPdo()->query($query)->fetch();
        }
        else{
            $query = "SELECT `id_status`, `status_name` FROM `order_statuses` WHERE 1";
            return $this->getPdo()->query($query)->fetchAll();
        }
}

    public function updateStatus($data){
        $query = "UPDATE `orders` SET `id_status` = '{$data['id_status']}' WHERE `orders`.`id_order` = '{$data['id_order']}';";
        if ($this->getPdo()->query($query))
            return true;
        else
            return false;
    }

    public function getReport($start, $end){
        $query = "SELECT o.`id_order`, o.`time_date_of_order` AS 'date', o.`time_date_of_order` AS 'time', d.`delivery_method_name`, p.`payment_method_name`, o.`delivery_address`, o.`id_client`, cl.`surname`, cl.`name`, cl.`patronymic`, cl.`e_mail`, cl.`phone_number`, o.`id_status`, os.`status_name`, SUM(v.`price`) as 'SUM'
            FROM `orders` o, `delivery_methods` d, `payment_methods` p, `users` cl, `order_statuses` os, `goods_in_basket_order` gb, `vehicles` v
            WHERE o.`id_payment_method` = p.`id_payment_method`
            AND o.`id_delivery_method` = d.`id_delivery_method`
            AND o.`id_status` = os.`id_status`
            AND o.`id_client` = cl.`id_user`
            AND o.`id_status` = '5'
            AND gb.`id_order` = o.`id_order`
            AND v.`id_vehicle` = gb.`id_vehicle`
            AND o.`time_date_of_order` >= '{$start}'
            AND o.`time_date_of_order` <= '{$end}'
            GROUP BY o.`id_order`";

        $data = $this->getPdo()->query($query)->fetchAll();
        $i = 0; $summ = 0;
        foreach ($data as $value) {
            $curentDate = date_create($value['date']);
            $curentTime = date_create($value['time']);

            $data[$i]['date'] = date_format($curentDate, 'd.m.Y');
            $data[$i]['time'] = date_format($curentDate, 'H:i');
            $data[$i]['name'] = mb_substr($data[$i]['name'],0,1).".";
            $data[$i]['patronymic'] = mb_substr($data[$i]['patronymic'],0,1).".";
            $data[$i]['SUM'] = number_format($data[$i]['SUM'], 2, ',', ' '). ' руб.';
            $i++;
        }
        return $data;
    }

    public function getSalesQuantity($start, $end){
        $query = "SELECT COUNT(o.`id_order`)
        FROM `orders` o
        WHERE o.`id_status` = '5'
        AND o.`time_date_of_order` >= '{$start}'
        AND o.`time_date_of_order` <= '{$end}'";
        return $this->getPdo()->query($query)->fetch()[0];
    }

    public function getReportTotalPrice($data){
        $summ =0; $i = 0;
        foreach ($data as $value) {
            $summ += $this->getTotalPrice($data[$i]['id_order'],true);
            $i++;
        }
        return number_format($summ, 2, ',', ' ');
    }

    public function makePaymentDoc($data, $totalPriceReport, $ordersQuantity, $PostData)
    {

        $template = new \PhpOffice\PhpWord\TemplateProcessor('admin/view/paymentDocs/Template.docx');
        $start = date_create($PostData['start']);
        $start = date_format($start, 'd.m.Y');

        date_default_timezone_set("Europe/Moscow");
        $curentDate = date("d.m.Y");

        $end = date_create($PostData['end']);
        $end = date_format($end, 'd.m.Y');

        $template->setValue('start', "{$start}");
        $template->setValue('end', "{$end}");
        $template->setValue('curentDate', "{$curentDate}");
        $template->setValue('admin_surname', "{$_SESSION['surname']}");
        $template->setValue('admin_user_name', "{$_SESSION['user_name']}");
        $template->setValue('admin_patronymic', "{$_SESSION['patronymic']}");
        $template->setValue('totalPriceReport', "{$totalPriceReport}");
        $template->setValue('ordersQuantity', "{$ordersQuantity}");

        $template->cloneRowAndSetValues('id_order', $data);

        $template->saveAs("admin/view/paymentDocs/ОТЧЕТ_с_{$PostData['start']}_по_{$PostData['end']}.docx");

        return "view/paymentDocs/ОТЧЕТ_с_{$PostData['start']}_по_{$PostData['end']}.docx";

    }

}