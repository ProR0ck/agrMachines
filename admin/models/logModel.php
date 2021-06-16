<?php


namespace admin\models;


class logModel extends \catalog\config\config
{
    public function chekUser($data){
        $query = "SELECT * FROM `users`
                  WHERE `log` = '{$data['log']}'
                  AND `pass` = '{$data['pass']}'
                  AND `id_role` = '1' ";
        $userData = $this->getPdo()->query($query)->fetch();

        if ($userData) {
            $_SESSION['admin'] = $data['log'];
            return true;
        }
        else {
            return false;
        }

    }
}