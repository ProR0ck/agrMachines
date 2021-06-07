<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "catalog/view/template/linkConfig.php"?>
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <script src="<?=$link?>catalog/view/javascript/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
    <link href="<?=$link?>catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
    <script src="<?=$link?>catalog/view/javascript/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <link href="<?=$link?>catalog/view/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css"/>
    <link href="<?=$link?>catalog/view/stylesheet/stylesheet.css" rel="stylesheet">
    <script src="<?=$link?>catalog/view/javascript/common.js" type="text/javascript"></script>
</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div id="logo"> <img src="http://localhost/image/catalog/opencart-logo.png" title="Ваш магазин"
                                     alt="Ваш магазин" class="img-responsive">
                </div>
            </div>
            <div class="col-sm-5">
                <div id="search" class="input-group">
                    <input type="text" name="search" value="" placeholder="Поиск" class="form-control input-lg">
                    <span class="input-group-btn">
    <button type="button" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
  </span>
                </div>
            </div>
            <div class="col-sm-3">
                <div id="cart" class="btn-group btn-block">
                    <button type="button" data-toggle="dropdown" data-loading-text="Загрузка..."
                            class="btn btn-inverse btn-block btn-lg dropdown-toggle"><i class="fa fa-shopping-cart"></i>
                        <span id="cart-total">Товаров: 0 (0.00р.)</span></button>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <p class="text-center">Ваша корзина пуста!</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>