<?php


namespace admin\controller;
use admin\models\categoryModel;
use admin\models\productModel;
use catalog\routes;
use catalog\models\productsModel;


class productController extends \admin\models\isUserModel
{
    public function show($title, $flag, $changeCategory = null, $success = null){
        $product = new productsModel();
        $products = $product->getProducts();
        $link = $this->map['host'];
        include "admin/view/template/head.php";
        include "admin/view/template/header.php";
        include "admin/view/template/left-menu.php";
        include "admin/view/template/product.php";
        include "admin/view/template/footer.php";
    }

    public function display($success = null){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $this->show("Товары",(__FUNCTION__),null,$success);
        }
    }
    public function showUpdate($id){
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
    public function showInsert(){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {

            $this->show("Добавление нового товара",(__FUNCTION__));
        }
    }
    public function makeInsert($value){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $category = new categoryModel();
            $category->insertCategory($value);
            header("Location: {$this->map['adminCategoriesInsertSuccess']}");
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