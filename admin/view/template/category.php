<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <?php if ($flag == "display") {?>
            <div class="pull-right"><a href="" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Добавить"><i class="fa fa-plus"></i></a>
                <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('Вы уверены?') ? $('#form-category').submit() : false;" data-original-title="Удалить"><i class="fa fa-trash-o"></i></button>
            </div>
            <?php }?>

            <?php if ($flag == "showUpdate") {?>
            <div class="pull-right">
                <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Сохранить"><i class="fa fa-save"></i></button>
                <a href="<?=$this->map['adminCategories']?>" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Отменить"><i class="fa fa-reply"></i></a>
            </div>
            <?php }?>
            <h1>Категории</h1>
            <ul class="breadcrumb">
                <li><a href="<?=$this->map['adminHome']?>">Главная</a></li>
                <li><a href="<?=$this->map['adminCategories']?>">Категории</a></li>
            </ul>
        </div>
    </div>
    <?php if ($flag == "display") {?>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> Список категорий</h3>
            </div>
            <div class="panel-body">
                <form action="<?=$this->map['adminHome']?>" method="get" enctype="multipart/form-data" id="form-category">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"></td>
                                <td class="text-left">Название категории</td>
                                <td class="text-center">Изменить</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($categories as $category) {?>
                            <tr>
                                <td class="text-center"><input type="checkbox" name="selected" value="<?=$category['id_category']?>"></td>
                                <td class="left"><?=$category['category_name']?></td>
                                <td class="text-right">
                                    <a href="<?=$this->map['adminCategoriesUpdate'].$category['id_category']?>" data-toggle="tooltip" title="Редактировать" class="btn btn-primary" data-original-title="Редактировать">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php }?>
    <?php if ($flag == "showUpdate") {?>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> Редактирование категории</h3>
            </div>
            <div class="panel-body">
                <form action="<?=$this->map['adminCategoriesUpdateComplete']?>" method="post" enctype="multipart/form-data" id="form-category" class="form-horizontal">
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-name1">Название категории:</label>
                        <div class="col-sm-10">
                            <input type="text" name="category_name" value="<?=$changeCategory['category_name']?>" placeholder="Название категории:" id="input-name1" class="form-control">
                            <input type="hidden" name="id_category" value="<?=$changeCategory['id_category']?>">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php }?>
</div>