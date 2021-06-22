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
                <li><a href="<?= $this->map['adminProducts'] ?>"><?= $title ?></a></li>
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
                    <form action="<?= $this->map['adminProductsDeleteComplete'] ?>" method="get"
                          enctype="multipart/form-data" id="form-category">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td style="width: 1px;" class="text-center"><input type="checkbox"
                                                                                       onclick="$('input[name*=\'selected\']').prop('checked', this.checked);">
                                    </td>
                                    <td class="text-left">Код</td>
                                    <td class="text-left">Категория</td>
                                    <td class="text-left">Страна</td>
                                    <td class="text-center">Производитель</td>
                                    <td class="text-center">Марка</td>
                                    <td class="text-center">Модель</td>
                                    <td class="text-center">Цена</td>
                                    <td class="text-center">VIN</td>
                                    <td class="text-center">Фото</td>
                                    <td class="text-center"></td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($products as $product) { ?>
                                    <tr>
                                        <td class="text-center"><input type="checkbox"
                                                                       name="selected<?= $product['id_vehicle'] ?>"
                                                                       value="<?= $product['id_vehicle'] ?>"></td>
                                        <td class="text-center"><?= $product['id_vehicle'] ?></td>
                                        <td class="text-left"><?= $product['category_name'] ?></td>
                                        <td class="text-left"><?= $product['country_name'] ?></td>
                                        <td class="text-left"><?= $product['manufacturer_name'] ?></td>
                                        <td class="text-left"><?= $product['mark_name'] ?></td>
                                        <td class="text-left"><?= $product['model_name'] ?></td>
                                        <td class="text-left"><?= $product['price'] ?></td>
                                        <td class="text-left"><?= $product['VIN'] ?></td>
                                        <td class="text-left">
                                            <a class="thumbnail"
                                               href="<?= $link ?>/catalog/view/image/<?= $product['path'] ?>"
                                               title="Apple Cinema 30&quot;">
                                                <img src="<?= $link ?>/catalog/view/image/<?= $product['path'] ?>"
                                                     title="<?= $product['model_name'] ?>"
                                                     alt="<?= $product['model_name'] ?>" width="50" height="50">
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= $this->map['adminProductsUpdate'] . $product['id_vehicle'] ?>"
                                               data-toggle="tooltip" title="Редактировать" class="btn btn-primary"
                                               data-original-title="Редактировать">
                                                <i class="fa fa-pencil"></i>
                                            </a>
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
                    <h3 class="panel-title"><i class="fa fa-pencil"></i><?= $title ?></h3>
                </div>
                <div class="panel-body">
                    <form action="<?= $this->map['adminProductsUpdateComplete'] ?>" method="post"
                          enctype="multipart/form-data" id="form-category" class="form-horizontal">

                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-name1">Категории:</label>
                            <div class="col-sm-10">
                                <input type="text" name="category_name" value="<?= $changeCategory['category_name'] ?>"
                                       placeholder="Название категории:" id="input-name1" class="form-control">
                                <input type="hidden" name="id_category" value="<?= $changeCategory['id_category'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-parent">Категория:</label>
                            <div class="col-sm-10">
                                <select name="parent_id" class="form-control">
                                    <option value="0" selected="selected"> --- Не выбрано ---</option>
                                    <option value="34">MP3 Плееры</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if ($flag == "showInsert") { ?>
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-plus"></i> <?= $title ?></h3>
                </div>
                <div class="panel-body">
                    <form action="<?= $this->map['adminProductsInsertComplete'] ?>" method="post"
                          enctype="multipart/form-data" id="form-category" class="form-horizontal">
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-id_category">Категория</label>
                            <div class="col-sm-10">
                                <select name="id_category" class="form-control">
                                    <option value="0" selected="selected"> --- Не выбрано ---</option>
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?= $category['id_category'] ?>"><?= $category['category_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-id_model">Марка - модель</label>
                            <div class="col-sm-10">
                                <select name="id_model" class="form-control">
                                    <option value="0" selected="selected"> --- Не выбрано ---</option>
                                    <?php foreach ($markAndModels as $markAndModel) { ?>
                                        <option value="<?= $markAndModel['id_model'] ?>"><?= $markAndModel['mark_name'] ?> <?= $markAndModel['model_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-id_manufacturer">Производитель</label>
                            <div class="col-sm-10">
                                <select name="id_manufacturer" class="form-control">
                                    <option value="0" selected="selected"> --- Не выбрано ---</option>
                                    <?php foreach ($manufacturers as $manufacturer) { ?>
                                        <option value="<?= $manufacturer['id_manufacturer'] ?>"><?= $manufacturer['manufacturer_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-id_country">Страна</label>
                            <div class="col-sm-10">
                                <select name="id_country" class="form-control">
                                    <option value="0" selected="selected"> --- Не выбрано ---</option>
                                    <?php foreach ($countries as $country) { ?>
                                        <option value="<?= $country['id_country'] ?>"><?= $country['country_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-id_color">Цвет</label>
                            <div class="col-sm-9">
                                <select name="id_color" id="id_color" class="form-control"
                                        onchange="OnSelectionChange (this)">
                                    <option value="0" selected="selected"> --- Не выбрано ---</option>
                                    <?php foreach ($colors as $color) { ?>
                                        <option value="<?= $color['id_color'] ?>"
                                                id="<?= $color['color_code'] ?>"><?= $color['color_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-1" class="form-control">
                                <div id="colorbox" style="padding: 15px;"></div>
                            </div>
                        </div>

                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-id_salon">Салон</label>
                            <div class="col-sm-10">
                                <select name="id_salon" class="form-control">
                                    <option value="0" selected="selected"> --- Не выбрано ---</option>
                                    <?php foreach ($salons as $salon) { ?>
                                        <option value="<?= $salon['id_salon'] ?>"><?= $salon['salon_name'] ?>
                                            (<?= $salon['salon_address'] ?>)
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-id_stock_status">Статус</label>
                            <div class="col-sm-10">
                                <select name="id_stock_status" class="form-control">
                                    <option value="0" selected="selected"> --- Не выбрано ---</option>
                                    <?php foreach ($stockStatuses as $stockStatus) { ?>
                                        <option value="<?= $stockStatus['id_stock_status'] ?>"><?= $stockStatus['stock_status_value'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-VIN">VIN</label>
                            <div class="col-sm-10">
                                <input type="text" name="VIN" placeholder="Введите VIN:" id="VIN" class="form-control">
                            </div>
                        </div>

                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-description">Описание</label>
                            <div class="col-sm-10">
                                <textarea name="description" rows="5" placeholder="Мета-тег Description"
                                          id="input-meta-description1" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-price">Стоимость (руб.)</label>
                            <div class="col-sm-10">
                                <input type="text" name="price" placeholder="Введите цену в рублях:" id="price"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-price">Загрузите изображения (.jpg . jpeg
                                .png)</label>
                            <div class="col-sm-10">
                                <input type="file" accept=".jpg,.jpeg,.png" multiple="multiple" name="photos[]">
                            </div>
                        </div>

                    </form>
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