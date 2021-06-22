<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <?php if ($flag == "display") { ?>

            <?php } ?>

            <?php if ($flag == "showUpdate" || $flag == "showInsert") { ?>
                <div class="pull-right">
                    <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary"
                            data-original-title="Сохранить"><i class="fa fa-save"></i></button>
                    <a href="<?= $this->map['adminOrders'] ?>" data-toggle="tooltip" title=""
                       class="btn btn-default" data-original-title="Отменить"><i class="fa fa-reply"></i></a>
                </div>
            <?php } ?>
            <h1><?= $title ?></h1>
            <ul class="breadcrumb">
                <li><a href="<?= $this->map['adminHome'] ?>">Главная</a></li>
                <li><a href="<?= $this->map['adminOrders'] ?>">Заказы</a></li>
            </ul>
        </div>
    </div>
    <?php if ($flag == "display") { ?>
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-list"></i><?= $title ?></h3>
                </div>
                <div class="panel-body">
                    <?php if ($success) { ?>
                        <div class="alert alert-success" role="alert">
                            <i class="fa fa-refresh fa-spin"></i> Данные в базе успешно изменены!
                        </div>
                    <?php } ?>
                    <form action="<?= $this->map['adminCategoriesDeleteComplete'] ?>" method="get"
                          enctype="multipart/form-data" id="form-category">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td class="text-left">№</td>
                                    <td class="text-center">Дата</td>
                                    <td class="text-center">Время</td>
                                    <td class="text-center">Клиент</td>
                                    <td class="text-center">Оплата</td>
                                    <td class="text-center">Тип доставки</td>
                                    <td class="text-center">Адрес</td>
                                    <td class="text-center">Товары</td>
                                    <td class="text-center">Итоговая цена (руб.)</td>
                                    <td class="text-center">Чек</td>
                                    <td class="text-center">Статус заказа</td>
                                    <td class="text-center">Изменить</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($ordersList as $order) { ?>
                                    <tr>
                                       <td class="text-left"><?=$order['id_order']?></td>
                                        <td class="text-left"><?=$order['date']?></td>
                                        <td class="text-left"><?=$order['time']?></td>
                                        <td class="text-left"><?=$order['surname']?> <?=$order['name']?><?=$order['patronymic']?>
                                            <ul>
                                                <li><?=$order['e_mail']?></li>
                                                <li><?=$order['phone_number']?></li>
                                            </ul>
                                        </td>
                                        <td class="text-left"><?=$order['payment_method_name']?></td>
                                        <td class="text-left"><?=$order['delivery_method_name']?></td>
                                        <td class="text-left"><?=$order['delivery_address']?></td>
                                        <td class="text-left">
                                            <ul>
                                            <?php $products = $orders->getBasketProducts($order['id_order']); foreach ($products as $product) {?>
                                                <li><?= $product['mark_name'] ?> <?= $product['model_name'] ?></li>
                                            <?php }?>
                                            </ul>
                                        </td>
                                        <?php $totalPrice = $orders->getTotalPrice($order['id_order']);?>
                                        <td class="text-left"><?=$totalPrice?></td>
                                        <td class="text-center"><a href="<?=$link?>/catalog/view/paymentDocs/ЧЕК-<?=$order['id_order']?>.docx">скачать</a></td>
                                        <td class="text-center"><?=$order['status_name']?></td>
                                        <td class="text-center">
                                            <a href="<?= $this->map['adminOrdersUpdate'] . $order['id_order'] ?>"
                                               data-toggle="tooltip" title="Редактировать" class="btn btn-primary"
                                               data-original-title="Редактировать"><i class="fa fa-pencil"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if ($flag == "showUpdate") { ?>
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-pencil"></i><?=$title?></h3>
                </div>
                <div class="panel-body">
                    <form action="<?= $this->map['adminOrdersUpdateComplete'] ?>" method="post"
                          enctype="multipart/form-data" id="form-category" class="form-horizontal">
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-parent">Статус:</label>
                            <div class="col-sm-10">
                                <select name="id_status" class="form-control">
                                    <option value="<?= $oldStatus['id_status'] ?>" selected="selected"><?= $oldStatus['status_name'] ?></option>
                                    <?php foreach ($statusList as $status) {?>
                                        <option value="<?= $status['id_status'] ?>"><?= $status['status_name'] ?></option>
                                    <?php }?>
                                    <input type="hidden" name="id_order" value="<?=$oldStatus['id_order']?>">
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
</div>