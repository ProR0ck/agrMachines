<?php


namespace admin\models;


class colorsModel extends \catalog\config\config
{
    public function getColors(){
        $query = "SELECT `id_color`, `color_name`, `color_code` FROM `colors` WHERE 1";
        return $this->getPdo()->query($query)->fetchAll();
    }

    public function getColor($id){
        $query = "SELECT `id_color`, `color_name`, `color_code` FROM `colors` WHERE `id_color` = '{$id}'";
        return $this->getPdo()->query($query)->fetch();
    }

    public function updateColor($data){
        $query = "UPDATE `colors` SET `color_name`='{$data['color_name']}', `color_code`='{$data['color_code']}' WHERE `id_color` = '{$data['id_color']}'";
        if ($this->getPdo()->query($query))
            return true;
        else
            return false;
    }

    public function insertColor($value){
        $query = "INSERT INTO `colors` (`id_color`, `color_name`, `color_code`) VALUES (NULL, '{$value['color_name']}', '{$value['color_code']}')";
        if ($this->getPdo()->query($query))
            return true;
        else
            return false;
    }

    public function deleteColor($value){
     foreach ($value as $id){
         $query = "DELETE FROM `colors` WHERE `id_color` = '{$id}'";
         if ($this->getPdo()->query($query))
             $result = true;
         else
             $result = false;
     }
     return $result;
    }

}