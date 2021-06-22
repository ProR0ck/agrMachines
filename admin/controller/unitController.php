<?php


namespace admin\controller;
use admin\models\unitModel;
use catalog\routes;


class unitController extends \admin\models\isUserModel
{
    public function show($title, $flag, $changeUnit = null, $success = null){
        $unit = new unitModel();
        $units = $unit->getUnits();
        $link = $this->map['host'];
        include "admin/view/template/head.php";
        include "admin/view/template/header.php";
        include "admin/view/template/left-menu.php";
        include "admin/view/template/unit.php";
        include "admin/view/template/footer.php";
    }

    public function display($success = null){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $this->show("Единицы измерения",(__FUNCTION__),null,$success);
        }
    }
    public function showUpdate($id){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $unit = new unitModel();
            $changeUnit = $unit->getUnit($id);

            $this->show("Изменение единицы измерения",(__FUNCTION__),$changeUnit);
        }
    }
    public function makeUpdate($data){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $unit = new unitModel();
            $unit->updateUnit($data);
            header("Location: {$this->map['adminUnitsUpdateSuccess']}");
        }
    }
    public function showInsert(){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {

            $this->show("Добавление новой единицы измерения",(__FUNCTION__));
        }
    }
    public function makeInsert($value){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $unit = new unitModel();
            $unit->insertUnit($value);
            header("Location: {$this->map['adminUnitsInsertSuccess']}");
        }
    }
    public function makeDelete($value){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $unit = new unitModel();
            $unit->deleteUnit($value);
            header("Location: {$this->map['adminUnitsInsertSuccess']}");
        }
    }
}