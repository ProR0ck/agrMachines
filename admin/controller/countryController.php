<?php


namespace admin\controller;
use admin\models\countryModel;
use admin\models\сountryModel;
use catalog\routes;


class countryController extends \admin\models\isUserModel
{
    public function show($title, $flag, $changeCountry = null, $success = null){
        $country = new countryModel();
        $countries = $country->getCountries();
        $link = $this->map['host'];
        include "admin/view/template/head.php";
        include "admin/view/template/header.php";
        include "admin/view/template/left-menu.php";
        include "admin/view/template/country.php";
        include "admin/view/template/footer.php";
    }

    public function display($success = null){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $this->show("Страны",(__FUNCTION__),null,$success);
        }
    }
    public function showUpdate($id){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $country = new countryModel();
            $changeCountry = $country->getCountry($id);

            $this->show("Изменение страны",(__FUNCTION__),$changeCountry);
        }
    }
    public function makeUpdate($data){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $country = new countryModel();
            $country->updateCountry($data);
            header("Location: {$this->map['adminCountriesUpdateSuccess']}");
        }
    }
    public function showInsert(){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {

            $this->show("Добавление новой страны",(__FUNCTION__));
        }
    }
    public function makeInsert($value){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $country = new countryModel();
            $country->insertСountry($value);
            header("Location: {$this->map['adminCountriesInsertSuccess']}");
        }
    }
    public function makeDelete($value){
        if (!$this->is_admin) header("Location: {$this->map['adminAuth']}");
        else {
            $country = new countryModel();
            $country->deleteCountry($value);
            header("Location: {$this->map['adminCountriesInsertSuccess']}");
        }
    }
}