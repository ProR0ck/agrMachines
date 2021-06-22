<div class="container">
    <ul class="breadcrumb">
        <li><a href="<?= $route->map['home'] ?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?= $route->map['account'] ?>">Личный кабинет</a></li>
        <?php if (isset($_SESSION['log'])) { ?>
            <li><a href="<?= $route->map['history'] ?>">История заказов</a></li>
        <?php } ?>
    </ul>
    <div class="col-sm-12">
        <h3>История заказов</h3>
        <table class="table table-bordered">
            <thead>
            <tr>
                <td class="text-left">№ заказа</td>
                <td class="text-left">Дата заказа</td>
                <td class="text-left">Время заказа</td>
                <td class="text-left">Способ доставки</td>
                <td class="text-left">Способ оплаты</td>
                <td class="text-left">Адрес доставки</td>
                <td class="text-left">Корзина заказа</td>
                <td class="text-left">Итоговая цена (руб.)</td>
                <td class="text-center">Чек</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($orders as $value) { ?>
                <tr>
                    <td class="text-left">
                        <?= $value['id_order'] ?>
                    </td>
                    <td class="text-left">
                        <?= $value['date'] ?>
                    </td>
                    <td class="text-left">
                        <?= $value['time'] ?>
                    </td>
                    <td class="text-left">
                        <?= $value['delivery_method_name'] ?>
                    </td>
                    <td class="text-left">
                        <?= $value['payment_method_name'] ?>
                    </td>
                    <td class="text-left">
                        <?= $value['delivery_address'] ?>
                    </td>
                    <td>
                        <ul>
                            <?php $products = $order->getBasketProducts($value['id_order']);
                            foreach ($products as $product) { ?>
                                <li>
                                    <a href="<?= $route->map['product'] . $product['id_vehicle'] ?>"><?= $product['mark_name'] ?> <?= $product['model_name'] ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </td>
                    <td>
                        <?= $order->getTotalPrice($value['id_order']) ?>
                    </td>
                    <td>
                        <a href="<?= $link ?>/catalog/view/paymentDocs/ЧЕК-<?= $value['id_order'] ?>.docx">скачать</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>