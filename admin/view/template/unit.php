<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <?php if ($flag == "display") {?>
            <div class="pull-right"><a href="<?=$this->map['adminUnitsInsert']?>" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Добавить"><i class="fa fa-plus"></i></a>
                <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('Вы уверены?') ? $('#form-unit').submit() : false;" data-original-title="Удалить"><i class="fa fa-trash-o"></i></button>
            </div>
            <?php }?>

            <?php if ($flag == "showUpdate" || $flag =="showInsert") {?>
            <div class="pull-right">
                <button type="submit" form="form-unit" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Сохранить"><i class="fa fa-save"></i></button>
                <a href="<?=$this->map['adminUnits']?>" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Отменить"><i class="fa fa-reply"></i></a>
            </div>
            <?php }?>
            <h1><?=$title?></h1>
            <ul class="breadcrumb">
                <li><a href="<?=$this->map['adminHome']?>">Главная</a></li>
                <li><a href="<?=$this->map['adminUnits']?>"><?=$title?></a></li>
            </ul>
        </div>
    </div>
    <?php if ($flag == "display") {?>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> Список единиц измерения</h3>
            </div>
            <div class="panel-body">
                <?php if($success) {?>
                    <div class="alert alert-success" role="alert">
                        <i class="fa fa-refresh fa-spin"></i> Данные в базе успешно изменены!
                    </div>
                <?php }?>
                <form action="<?=$this->map['adminUnitsDeleteComplete']?>" method="get" enctype="multipart/form-data" id="form-unit">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"></td>
                                <td class="text-left">Название единицы измерения</td>
                                <td class="text-left">Сокращение</td>
                                <td class="text-center">Изменить</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($units as $unit) {?>
                            <tr>
                                <td class="text-center"><input type="checkbox" name="selected<?=$unit['id_unit']?>" value="<?=$unit['id_unit']?>"></td>
                                <td class="left"><?=$unit['unit_name']?></td>
                                <td class="left"><?=$unit['unit_symbol']?></td>
                                <td class="text-right">
                                    <a href="<?=$this->map['adminUnitsUpdate'].$unit['id_unit']?>" data-toggle="tooltip" title="Редактировать" class="btn btn-primary" data-original-title="Редактировать">
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
                <h3 class="panel-title"><i class="fa fa-pencil"></i> Редактирование единицы измерения</h3>
            </div>
            <div class="panel-body">
                <form action="<?=$this->map['adminUnitsUpdateComplete']?>" method="post" enctype="multipart/form-data" id="form-unit" class="form-horizontal">
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-name1">Название единицы измерения:</label>
                        <div class="col-sm-10">
                            <input type="text" name="unit_name" value="<?=$changeUnit['unit_name']?>" placeholder="Название единицы измерения:" id="input-name1" class="form-control">
                            <input type="hidden" name="id_unit" value="<?=$changeUnit['id_unit']?>">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-name1">Название единицы измерения:</label>
                        <div class="col-sm-10">
                            <input type="text" name="unit_symbol" value="<?=$changeUnit['unit_symbol']?>" placeholder="Сокращение:" id="input-name1" class="form-control">
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
                    <form action="<?=$this->map['adminUnitsInsertComplete']?>" method="post" enctype="multipart/form-data" id="form-unit" class="form-horizontal">
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-name1">Название единицы измерения:</label>
                            <div class="col-sm-10">
                                <input type="text" name="unit_name" placeholder="Название единицы измерения:" id="input-name1" class="form-control">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-name1">Сокращение:</label>
                            <div class="col-sm-10">
                                <input type="text" name="unit_symbol" placeholder="Сокращение:" id="input-name1" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php }?>
</div>