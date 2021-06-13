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
                                    <tr>
                                        <td class="text-right">
                                            <strong>Итого:</strong>
                                        </td>
                                        <td class="text-left">
                                            <?=$totalPrice?>
                                        </td>
                                        <td class="text-left">

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>