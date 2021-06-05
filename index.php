<?php
spl_autoload_register(function($class) {
    require_once strtolower(str_replace('\\', '/', $class) . '.php');
});

use catalog\controllers;
use catalog\routes\route;

$route = new route();
$curentRoute = $route->getRoute();
echo $curentRoute;

if ($curentRoute == $route->map['home']){
    $page = new controllers\indexController();
    $page->showPage();
}
if ($curentRoute == $route->map['product']){
    echo "продукт";
}
if ($curentRoute == $route->map['about']){
    echo "о нас";
}
