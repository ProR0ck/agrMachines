<?php


namespace admin\controller;
use admin\models\categoryModel;
use admin\models\productModel;
use catalog\routes;
use catalog\models\productsModel;


class productController extends \admin\models\isUserModel
{
    public function show($title, $flag, $categories = null, $markAndModels = null, $manufacturers = null, $countries = null, $colors = null, $salons = null, $stockStatuses = null, $success = null){
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
            $this->show("Товары",(__FUNCTION__),null, null,null,null,null,null,null, $success);
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
            $product = new productModel();
            $categories = $product->getCategory();
            $markAndModels = $product->getMarkAndModels();
            $manufacturers = $product->getManufacturers();
            $countries = $product->getCountries();
            $colors = $product->getColors();
            $salons = $product->getSalons();
            $stockStatuses = $product->getStockStatuses();
            $this->show("Добавление нового товара",(__FUNCTION__),$categories,$markAndModels,$manufacturers, $countries, $colors, $salons, $stockStatuses);
        }
    }
    public function makeInsert($data, $photos){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $product = new productModel();
            $product->insertProduct($data,$photos);
            header("Location: {$this->map['adminProductsInsertSuccess']}");
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