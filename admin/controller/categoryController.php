<?php


namespace admin\controller;
use admin\models\categoryModel;
use catalog\routes;


class categoryController extends \admin\models\isUserModel
{
    public function show($title, $flag, $changeCategory = null, $success = null){
        $category = new categoryModel();
        $categories = $category->getCategories();
        $link = $this->map['host'];
        include "admin/view/template/head.php";
        include "admin/view/template/header.php";
        include "admin/view/template/left-menu.php";
        include "admin/view/template/category.php";
        include "admin/view/template/footer.php";
    }

    public function display($success = null){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $this->show("Категории товаров",(__FUNCTION__),null,$success);
        }
    }

    function showUpdate($id){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $category = new categoryModel();
            $changeCategory = $category->getCategory($id);

            $this->show("Изменение категории",(__FUNCTION__),$changeCategory);
        }
    }

    public function makeUpdate($data){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $category = new categoryModel();
            $category->updateCategory($data);
            header("Location: {$this->map['adminCategoriesUpdateSuccess']}");
        }
    }
}