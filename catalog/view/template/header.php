<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <script src="<?=$link?>/catalog/view/javascript/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
    <link href="<?=$link?>/catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
    <script src="<?=$link?>/catalog/view/javascript/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <link href="<?=$link?>/catalog/view/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css"/>
    <link href="<?=$link?>/catalog/view/stylesheet/stylesheet.css" rel="stylesheet">
    <script src="<?=$link?>/catalog/view/javascript/common.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
</head>
<body>
<nav id="top">
    <div class="container">

        <div id="top-links" class="nav pull-right">
            <ul class="list-inline">
                <li><a href="http://localhost:8888/opencart/index.php?route=information/contact"><i class="fa fa-phone"></i></a> <span class="hidden-xs hidden-sm hidden-md">123456789</span></li>
                <li class="dropdown"><a href="http://localhost:8888/opencart/index.php?route=account/account" title="Личный кабинет" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <span class="hidden-xs hidden-sm hidden-md">Личный кабинет</span> <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="<?=$route->map['register']?>">Регистрация</a></li>
                        <li><a href="<?=$route->map['login']?>">Авторизация</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<header>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div id="logo"><a href="<?=$link?>" class="gref"><img src="<?=$link?>/catalog/view/image/logo.png" title="Ваш магазин"
                                     alt="Ваш магазин" class="img-responsive">
                    </a>
                </div>
            </div>
            <div class="col-sm-5">
                <form method="get" action="<?=$link?>">
                    <div id="search" class="input-group">
                        <input type="text" name="search" value="" placeholder="Поиск" class="form-control input-lg">
                        <span class="input-group-btn">
                        <button type="submit" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
                     </span>
                    </div>
                </form>

            </div>
            <div class="col-sm-3">
                <div id="cart" class="btn-group btn-block">
                    <button type="button" data-toggle="dropdown" data-loading-text="Загрузка..."
                            class="btn btn-inverse btn-block btn-lg dropdown-toggle"><i class="fa fa-shopping-cart"></i>
                        <span id="cart-total"><?=$totalPrice?></span></button>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <table class="table table-striped">
                                <tbody>
                                    <?php foreach ($productsInBasket as $product) {?>
                                    <tr>
                                        <td class="text-left">
                                            <a href="<?=$link?>/product/<?=$product['id_vehicle']?>"><?=$product['mark_name']?> <?=$product['model_name']?></a>
                                        </td>
                                        <td class="text-right">
                                            <?=$product['price']?>
                                        </td>
                                        <td class="text-center">
                                            <button type="button"
                                                    onclick= "window.location.href = '<?=$link?>/delete-from-basket/<?=$product['id_vehicle']?>';"
                                                    title="Удалить"
                                                    class="btn btn-danger btn-xs">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                            <?php if ($totalPrice > 0) {?>
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td class="text-right"><strong>Итого</strong></td>
                                    <td class="text-right"><?=$totalPrice?></td>
                                </tr>
                                </tbody>
                            </table>
                            <?php } else {?>

                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td class="text-center"><strong>Ваша корзина пуста :(</strong></td>
                                </tr>
                                </tbody>
                            </table>
                            <?php }?>
                            <?php if ($makeOrder) {?>
                                <p class="text-right">
                                    <a href="<?=$route->map['newOrder']?>"><strong> <i class="fa fa-share"></i> Оформить заказ&nbsp;&nbsp;&nbsp;</strong>
                                    </a>
                                </p>
                            <?php }?>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>