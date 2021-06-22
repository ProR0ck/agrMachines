<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <?php if ($flag == "display") {?>
            <div class="pull-right"><a href="<?=$this->map['adminColorsInsert']?>" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Добавить"><i class="fa fa-plus"></i></a>
                <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('Вы уверены?') ? $('#form-category').submit() : false;" data-original-title="Удалить"><i class="fa fa-trash-o"></i></button>
            </div>
            <?php }?>

            <?php if ($flag == "showUpdate" || $flag =="showInsert") {?>
            <div class="pull-right">
                <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Сохранить"><i class="fa fa-save"></i></button>
                <a href="<?=$this->map['adminColors']?>" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Отменить"><i class="fa fa-reply"></i></a>
            </div>
            <?php }?>
            <h1><?=$title?></h1>
            <ul class="breadcrumb">
                <li><a href="<?=$this->map['adminHome']?>">Главная</a></li>
                <li><a href="<?=$this->map['adminColors']?>"><?=$title?></a></li>
            </ul>
        </div>
    </div>
    <?php if ($flag == "display") {?>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i><?=$title?></h3>
            </div>
            <div class="panel-body">
                <?php if($success) {?>
                    <div class="alert alert-success" role="alert">
                        <i class="fa fa-refresh fa-spin"></i> Данные в базе успешно изменены!
                    </div>
                <?php }?>
                <form action="<?=$this->map['adminColorsDeleteComplete']?>" method="get" enctype="multipart/form-data" id="form-category">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"></td>
                                <td class="text-left">Название цвета</td>
                                <td class="text-left">Палитра</td>
                                <td class="text-left">#код цвета</td>
                                <td class="text-center">Изменить</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($colors as $color) {?>
                            <tr>
                                <td class="text-center"><input type="checkbox" name="selected<?=$color['id_color']?>" value="<?=$color['id_color']?>"></td>
                                <td class="left"><?=$color['color_name']?></td>
                                <td class="left" style="background-color: <?=$color['color_code']?>"></td>
                                <td class="left"><?=$color['color_code']?></td>
                                <td class="text-center">
                                    <a href="<?=$this->map['adminColorsUpdate'].$color['id_color']?>" data-toggle="tooltip" title="Редактировать" class="btn btn-primary" data-original-title="Редактировать">
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
                    <h3 class="panel-title"><i class="fa fa-plus"></i> <?=$title?></h3>
                </div>
                <div class="panel-body">
                    <form action="<?=$this->map['adminColorsUpdateComplete']?>" method="post" enctype="multipart/form-data" id="form-category" class="form-horizontal">
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-name1">Название цвета:</label>
                            <div class="col-sm-10">
                                <input type="text" name="color_name" placeholder="Название цвета:" id="input-name1" class="form-control" value="<?=$changeColor['color_name']?>">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-name1">#Код цвета:</label>
                            <div class="col-sm-10">
                                <input type="text" name="color_code" placeholder="#ff0044" id="input-name1" class="form-control" value="<?=$changeColor['color_code']?>">
                                <input type="hidden" name="id_color" value="<?=$changeColor['id_color']?>">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php }?>
    <?php if ($flag == "showInsert") {?>
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-plus"></i> <?=$title?></h3>
                </div>
                <div class="panel-body">
                    <form action="<?=$this->map['adminColorsInsertComplete']?>" method="post" enctype="multipart/form-data" id="form-category" class="form-horizontal">
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-name1">Название цвета:</label>
                            <div class="col-sm-10">
                                <input type="text" name="color_name" placeholder="Название цвета:" id="input-name1" class="form-control">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-name1">#Код цвета:</label>
                            <div class="col-sm-10">
                                <input type="text" name="color_code" placeholder="#ff0044" id="input-name1" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php }?>
</div>