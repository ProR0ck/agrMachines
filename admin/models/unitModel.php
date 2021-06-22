<?php


namespace admin\models;


class unitModel extends \catalog\config\config
{
    public function getUnits(){
        $query = "SELECT * FROM `units`";
        return $this->getPdo()->query($query)->fetchAll();
    }

    public function getUnit($id){
        $query = "SELECT `id_unit`, `unit_name`, `unit_symbol` FROM `units` WHERE `id_unit` = '{$id}'";
        return $this->getPdo()->query($query)->fetch();
    }

    public function updateUnit($data){
        $query = "UPDATE `units` SET `unit_name`='{$data['unit_name']}' WHERE `id_unit` = '{$data['id_unit']}'";
        if ($this->getPdo()->query($query))
            return true;
        else
            return false;
    }

    public function insertUnit($value){
        $query = "INSERT INTO `units` (`id_unit`, `unit_name`, `unit_symbol`) VALUES (NULL, '{$value['unit_name']}', '{$value['unit_symbol']}')";
        if ($this->getPdo()->query($query))
            return true;
        else
            return false;
    }

    public function deleteUnit($value){
     foreach ($value as $id){
         $query = "DELETE FROM `units` WHERE `id_unit` = '{$id}'";
         if ($this->getPdo()->query($query))
             $result = true;
         else
             $result = false;
     }
     return $result;
    }

}