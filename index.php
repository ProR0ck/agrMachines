<?php
spl_autoload_register();
$uri = $_SERVER['REQUEST_URI'];

if ('/agrMachines/' == $uri){
    $page = new \catalog\controllers\homeController();
    $page->showPage();
}