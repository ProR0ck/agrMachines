<div class="container">
    <ul class="breadcrumb">
        <li><a href="<?= $route->map['home'] ?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?= $route->map['newOrder'] ?>">Оформление заказа</a></li>
    </ul>
    <?php if (isset($success)) { ?>
        <div class="alert alert-success" role="alert">
            <i class="fa fa-refresh fa-spin"></i> <?= $success ?>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-sm-12">
            <h1>Корзина заказа</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <td class="text-left">Страна</td>
                    <td class="text-left">Производитель</td>
                    <td class="text-left">Модель</td>
                    <td class="text-left">VIN</td>
                    <td class="text-right">Цена за шт.</td>
                    <td class="text-center">Убрать</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($productsInBasket as $product) { ?>
                    <tr>
                        <td class="text-left">
                            <a href="<?= $link ?>/product/<?= $product['id_vehicle'] ?>"><?= $product['country_name'] ?></a>
                        </td>
                        <td class="text-left">
                            <a href="<?= $link ?>/product/<?= $product['id_vehicle'] ?>"><?= $product['manufacturer_name'] ?></a>
                        </td>
                        <td class="text-left">
                            <a href="<?= $link ?>/product/<?= $product['id_vehicle'] ?>"><?= $product['model_name'] ?></a>
                        </td>
                        <td class="text-left">
                            <a href="<?= $link ?>/product/<?= $product['id_vehicle'] ?>"><?= $product['VIN'] ?></a>
                        </td>
                        <td class="text-right"><?= $product['price'] ?></td>
                        <td class="text-center">
                            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"
                                    onclick="window.location.href = '<?= $route->map['deleteProductFromBasket'] . $product['id_vehicle'] ?>';"
                                    data-original-title="Удалить"><i class="fa fa-times-circle"></i>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td class="text-right" colspan="4"><strong>Итого</strong></td>
                    <td class="text-left" colspan="2"><strong><?= $totalPrice ?></strong></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php if ($totalPrice > 0) { ?>
    <div class="container">
        <div class="row">
            <div id="content" class="col-sm-9">
                <form action="<?= $route->map['newOrderComplete'] ?>" method="post" class="form-horizontal">
                    <fieldset id="address">
                        <legend>Детали заказа</legend>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-address-1">Адрес доставки</label>
                            <div class="col-sm-10">
                                <input type="text" name="address"
                                       value="<?php if (isset($data['address'])) echo $data['address']; elseif (isset($_SESSION['address'])) echo $_SESSION['address'] ?>"
                                       placeholder="Адрес" id="input-address-1" class="form-control" required>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-country">Способ доставки</label>
                        <div class="col-sm-10">
                            <select name="id_delivery_method" class="form-control">
                                <option value=""> --- Выберите ---</option>
                                <?php foreach ($deliveryMethods as $method) { ?>
                                    <option value="<?= $method['id_delivery_method'] ?>"><?= $method['delivery_method_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-country">Способ оплаты</label>
                        <div class="col-sm-10">
                            <select name="id_payment_method" class="form-control">
                                <option value=""> --- Выберите ---</option>
                                <?php foreach ($paymentMethods as $method) { ?>
                                    <option value="<?= $method['id_payment_method'] ?>"><?= $method['payment_method_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="buttons">
                        <div class="pull-right">
                            <input type="submit" value="Оформить заказ" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
