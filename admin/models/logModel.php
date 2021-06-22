<?php


namespace admin\models;


class logModel extends \catalog\config\config
{
    public function chekUser($data)
    {
        $query = "SELECT 
        u.`id_user`, 
        u.`surname`, 
        u.`name`, 
        u.`patronymic`, 
        u.`id_sex`, 
        u.`date_of_birth`, 
        u.`passport_series`, 
        u.`passport_ID`, 
        u.`e_mail`, 
        u.`phone_number`, 
        u.`address`, 
        u.`id_role`, 
        u.`log`, 
        u.`pass`, 
        u.`photo_path`,
        s.`sex_name`,
        r.`role_name`
        FROM `users` u, `sex_list` s, `role_list` r
        WHERE u.`log` = '{$data['log']}'
        AND u.`id_sex` = s.`id_sex`
        AND u.`id_role` = r.`id_role`
        AND u.`pass` = '{$data['pass']}'
        AND u.`id_role` = '1'";
        $userData = $this->getPdo()->query($query)->fetch();
        if ($userData) {
            $_SESSION['admin'] = $userData['log'];
            $_SESSION['id_user'] = $userData['id_user'];
            $_SESSION['surname'] = $userData['surname'];
            $_SESSION['user_name'] = $userData['name'];
            $_SESSION['patronymic'] = $userData['patronymic'];
            $_SESSION['id_sex'] = $userData['id_sex'];
            $_SESSION['sex_name'] = $userData['sex_name'];
            $_SESSION['date_of_birth'] = $userData['date_of_birth'];
            $_SESSION['passport_series'] = $userData['passport_series'];
            $_SESSION['passport_ID'] = $userData['passport_ID'];
            $_SESSION['e_mail'] = $userData['e_mail'];
            $_SESSION['phone_number'] = $userData['phone_number'];
            $_SESSION['address'] = $userData['address'];
            $_SESSION['id_role'] = $userData['id_role'];
            $_SESSION['role_name'] = $userData['role_name'];
            $_SESSION['log'] = $userData['log'];
            $_SESSION['pass'] = $userData['pass'];
            $_SESSION['photo_path'] = $userData['photo_path'];
            return true;
        } else {
            return false;
        }

    }
}