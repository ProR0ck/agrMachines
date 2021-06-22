<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <?php if ($flag == "display") { ?>
                <div class="pull-right"><a href="<?= $this->map['adminProductsInsert'] ?>" data-toggle="tooltip"
                                           title="" class="btn btn-primary" data-original-title="Добавить"><i
                            class="fa fa-plus"></i></a>
                    <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"
                            onclick="confirm('Вы уверены?') ? $('#form-category').submit() : false;"
                            data-original-title="Удалить"><i class="fa fa-trash-o"></i></button>
                </div>
            <?php } ?>

            <?php if ($flag == "showUpdate" || $flag == "showInsert") { ?>
                <div class="pull-right">
                    <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary"
                            data-original-title="Сохранить"><i class="fa fa-save"></i></button>
                    <a href="<?= $this->map['adminCategories'] ?>" data-toggle="tooltip" title=""
                       class="btn btn-default" data-original-title="Отменить"><i class="fa fa-reply"></i></a>
                </div>
            <?php } ?>
            <h1><?= $title ?></h1>
            <ul class="breadcrumb">
                <li><a href="<?= $this->map['adminHome'] ?>">Главная</a></li>
                <li><a href="<?= $this->map['adminReport'] ?>"><?= $title ?></a></li>
            </ul>
        </div>
    </div>
    <?php if ($flag == "display" || $flag == 'makeReport'){ ?>
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-list"></i><?= $title ?></h3>
                </div>
                <div class="panel-body">
                    <?php if ($success) { ?>
                        <div class="alert alert-success" role="alert">
                            <i class="fa fa-refresh fa-spin"></i>  Отчет успешно сформирован! <br> <a href="<?=$reportLink?>">скачать отчет в формате .docx</a>
                        </div>
                    <?php } ?>
                    <form action="<?= $this->map['adminReportMake'] ?>" method="post"
                          enctype="multipart/form-data" id="form-category">
                        <div class="well">
                            <div class="row">

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" for="input-date-added">Начало периода</label>
                                        <div class="input-group date">
                                            <?php if (isset($PostData['start'])) {?>
                                            <input type="date" name="start" class="form-control" value="<?=$PostData['start']?>">
                                            <?php } else {?>
                                                <input type="date" name="start" class="form-control">
                                            <?php }?>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" for="input-date-added">Конец периода</label>
                                        <div class="input-group date">
                                            <?php if (isset($PostData['end'])) {?>
                                                <input type="date" name="end" class="form-control" value="<?=$PostData['end']?>">
                                            <?php } else {?>
                                                <input type="date" name="end" class="form-control">
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" for="input-date-added"></label>
                                        <div class="input-group date">
                                            <button type="submit" id="button-filter" class="btn btn-primary pull-right"><i class="fa fa-filter"></i> Сформировать отчет</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php if ($flag == 'makeReport') {?>
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
                                <td class="text-center">Стоимость заказа (руб.)</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($reportData as $order) { ?>
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
                                </tr>
                            <?php } ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right"><b>Общая стоимость</b></td>
                                <td><?=$totalPriceReport?> руб.</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right"><b>Количество заказов</b></td>
                                <td><?=$ordersQuantity?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<script>
    function OnSelectionChange(select) {
        var selectedOption = select.options[select.selectedIndex];
        document.getElementById('colorbox').style.backgroundColor = selectedOption.id;
    }
</script>