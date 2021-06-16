<?php


namespace catalog\models;
use catalog\routes;


class loginModel extends \catalog\config\config
{
    public function login($log, $pass){
        $query = "SELECT `id_user`, `surname`, `name`, `patronymic`, `id_sex`, `date_of_birth`,
       `passport_series`, `passport_ID`, `e_mail`, `phone_number`,
       `address`, `id_role`, `log`, `pass`, `photo_path` 
        FROM `users`
        WHERE `log`= '{$log}' AND `pass`= '{$pass}' AND `id_role` = '2'";

        $userData = $this->getPdo()->query($query)->fetch();

        if (isset($userData['log']))
        {
            $_SESSION['id_user'] = $userData['id_user'];
            $_SESSION['surname'] = $userData['surname'];
            $_SESSION['user_name'] = $userData['name'];
            $_SESSION['patronymic'] = $userData['patronymic'];
            $_SESSION['id_sex'] = $userData['id_sex'];
            $_SESSION['date_of_birth'] = $userData['date_of_birth'];
            $_SESSION['passport_series'] = $userData['passport_series'];
            $_SESSION['passport_ID'] = $userData['passport_ID'];
            $_SESSION['e_mail'] = $userData['e_mail'];
            $_SESSION['phone_number'] = $userData['phone_number'];
            $_SESSION['address'] = $userData['address'];
            $_SESSION['id_role'] = $userData['id_role'];
            $_SESSION['log'] = $userData['log'];
            $_SESSION['pass'] = $userData['pass'];
            $_SESSION['photo_path'] = $userData['photo_path'];
            return true;
        }

        else
        {
            return false;
        }
    }

    public function logout (){
        session_destroy();

    }
}