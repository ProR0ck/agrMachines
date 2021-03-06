<div class="container">
    <?php if (isset($id)) { ?>
        <ul class="breadcrumb">

            <li><a href="<?= $link ?>"><i class="fa fa-home"></i></a></li>
            <li><a href="<?= $route->map['category'] . $id ?>"><?= $currentCategory ?></a></li>
        </ul>
    <?php } ?>
    <?php if (isset($_GET['added'])) { ?>
        <div class="alert alert-success" role="alert">
            <i class="fa fa-refresh fa-spin"></i> Товар успешно добавлен в корзину!
        </div>
    <?php } ?>
    <?php if (isset($_GET['deleted'])) { ?>
        <div class="alert alert-danger" role="alert">
            <i class="fa fa-refresh fa-spin"></i> Товар успешно удален из корзины!
        </div>
    <?php } ?>
    <?php if (!isset($currentCategory) && !isset($search)) { ?>
        <h3>Все товары</h3>
    <?php }
    if (isset($currentCategory)) { ?>
        <h3><?= $currentCategory ?></h3>

    <?php }
    if (isset($search)) { ?>
        <h3>Результаты по запросу "<?= $search ?>"</h3>
    <?php } ?>
    <div class="row">
        <?php foreach ($productsArrayOnMainPage as $product) { ?>
            <div class="product-layout col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="product-thumb transition">
                    <div class="image"><a href="<?= $link ?>/product/<?= $product['id_vehicle'] ?>"><img
                                    src="<?= $link ?>/catalog/view/image/<?= $product['path'] ?>"
                                    alt="<?= $product['category_name'] ?> <?= $product['model_name'] ?>"
                                    title="<?= $product['model_name'] ?>"
                                    class="img-responsive"
                                    style="width: 260px; height: 260px;"></a></div>
                    <div class="caption">
                        <h4>
                            <a href="<?= $link ?>/product/<?= $product['id_vehicle'] ?>"><?= $product['mark_name'] ?> <?= $product['model_name'] ?></a>
                        </h4>
                        <p>Категория - <strong><?= $product['category_name'] ?></strong></p>
                        <p><?= $product['description'] ?></p>
                        <p>VIN - <strong><?= $product['VIN'] ?></strong></p>
                        <p class="price">ЦЕНА - <strong><?= $product['price'] ?></strong></p></div>
                    <div class="button-group">
                        <button type="button" data-toggle="tooltip"
                                onclick="window.location.href = '<?= $link ?>/add-to-basket/<?= $product['id_vehicle'] ?>';"
                                data-original-title="Добавить в корзину"><i class="fa fa-shopping-cart"></i> <span
                                    class="hidden-xs hidden-sm hidden-md">В корзину</span></button>
                        <button type="button" data-toggle="tooltip"
                                onclick="window.location.href = '<?= $route->map['product'] ?><?= $product['id_vehicle'] ?>';"
                                data-original-title="посмотреть информацию о товаре"><i class="fa fa-info"></i></button>
                        <button type="button" data-toggle="tooltip" title="" onclick=""
                                data-original-title="В сравнение"><i class="fa fa-exchange"></i></button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>