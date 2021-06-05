<?php
//require_once ('catalog/controllers/indexController.php');
spl_autoload_register(function($class) {
    require_once strtolower(str_replace('\\', '/', $class) . '.php');
});
use catalog\controllers;
$page = new controllers\indexController();
$page->showPage();