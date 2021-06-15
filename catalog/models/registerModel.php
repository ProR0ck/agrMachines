<?php


namespace catalog\models;


class registerModel extends \catalog\config\config
{
    public function fullName($fullname){
        $error = null;
        setlocale(LC_ALL, "ru_RU.UTF-8");
        if (preg_match("/[^а-яё]/iu",$fullname)) $error = $error."Допустимы только а-я, А-Я"."<br>";
        if (mb_strlen($fullname) < 3) $error = $error."Минимум 3 символа"."<br>";
        if (mb_strlen($fullname) > 15) $error = $error."Максимум 15 символов";
        return $error;
    }
    public function coincidence($pas1,$pas2){
        $error = null;
        if ($pas1 != $pas2) $error = $error."Пароли не совпадают"."<br>";
        if (strlen($pas1) < 8) $error = $error."Минимум 8 символов";
        return $error;
    }
    public function insert($data){
        $query = "INSERT INTO `users` (`id_user`, `surname`, `name`, `patronymic`, `id_sex`, `date_of_birth`, `passport_series`, `passport_ID`, `e_mail`, `phone_number`, `address`, `id_role`, `log`, `pass`, `photo_path`) 
                  VALUES (NULL, '{$data['surname']}', '{$data['name']}', '{$data['patronymic']}', NULL, NULL, NULL, NULL, '{$data['e_mail']}', '{$data['phone_number']}', '{$data['address']}', '2', '{$data['e_mail']}', '{$data['password']}', NULL)";
        if ($this->getPdo()->query($query)) return true;
        return false;
    }
    public function update($data){
        $query = "UPDATE `users` SET `surname` = '{$data['surname']}',
                   `name` = '{$data['name']}',
                   `patronymic` = '{$data['patronymic']}',
                   `e_mail` = '{$data['e_mail']}', 
                   `phone_number` = '{$data['phone_number']}',
                   `address` = '{$data['address']}', 
                   `log` = '{$data['e_mail']}', 
                   `pass` = '{$data['password']}'
                    WHERE `id_user` = '{$_SESSION['id_user']}'";

        if ($this->getPdo()->query($query)) return true;
        return false;
    }
}