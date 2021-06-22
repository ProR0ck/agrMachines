<?php


namespace admin\controller;
use admin\models\colorsModel;
use catalog\routes;


class colorsController extends \admin\models\isUserModel
{
    public function show($title, $flag, $changeColor = null, $success = null){
        $color = new colorsModel();
        $colors = $color->getColors();
        $link = $this->map['host'];
        include "admin/view/template/head.php";
        include "admin/view/template/header.php";
        include "admin/view/template/left-menu.php";
        include "admin/view/template/colors.php";
        include "admin/view/template/footer.php";
    }

    public function display($success = null){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $this->show("Справочник цветов",(__FUNCTION__),null,$success);
        }
    }
    public function showUpdate($id){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $color = new colorsModel();
            $changeColor = $color->getColor($id);

            $this->show("Изменение категории",(__FUNCTION__),$changeColor);
        }
    }
    public function makeUpdate($data){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $color = new colorsModel();
            $color->updateColor($data);
            header("Location: {$this->map['adminColorsUpdateSuccess']}");
        }
    }
    public function showInsert(){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {

            $this->show("Добавление нового цвета",(__FUNCTION__));
        }
    }
    public function makeInsert($value){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $color = new colorsModel();
            $color->insertColor($value);
            header("Location: {$this->map['adminColorsInsertSuccess']}");
        }
    }
    public function makeDelete($value){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $category = new categoryModel();
            $category->deleteCategory($value);
            header("Location: {$this->map['adminCategoriesInsertSuccess']}");
        }
    }
}