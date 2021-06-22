<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <h1>Панель управления</h1>
            <ul class="breadcrumb">
                <li><a href="<?= $route->map['adminHome'] ?>">Главная</a></li>
                <li><a href="<?= $route->map['adminHome'] ?>">Панель управления</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="tile">
                    <div class="tile-heading">Всего заказов <span class="pull-right"></span></div>
                    <div class="tile-body"><i class="fa fa-shopping-cart"></i>
                        <h2 class="pull-right"><?= $orders ?></h2>
                    </div>
                    <div class="tile-footer"><a
                                href="<?=$route->map['adminOrders']?>">Подробнее...</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="tile">
                    <div class="tile-heading">Всего продаж <span class="pull-right"></span></div>
                    <div class="tile-body"><i class="fa fa-credit-card"></i>
                        <h2 class="pull-right"><?= $sales ?></h2>
                    </div>
                    <div class="tile-footer"><a
                                href="<?=$route->map['adminOrders']?>">Подробнее...</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="tile">
                    <div class="tile-heading">Всего покупателей <span class="pull-right"></span></div>
                    <div class="tile-body"><i class="fa fa-user"></i>
                        <h2 class="pull-right"><?= $customers ?></h2>
                    </div>
                    <div class="tile-footer"><a
                                href="#">Подробнее...</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="tile">
                    <div class="tile-heading">Всего салонов</div>
                    <div class="tile-body"><i class="fa fa-map-marker"></i>
                        <h2 class="pull-right"><?= $salons ?></h2>
                    </div>
                    <div class="tile-footer"><a
                                href="#">Подробнее...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>