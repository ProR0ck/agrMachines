<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <?php if ($flag == "display") {?>
            <div class="pull-right"><a href="<?=$this->map['adminCountriesInsert']?>" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Добавить"><i class="fa fa-plus"></i></a>
                <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('Вы уверены?') ? $('#form-category').submit() : false;" data-original-title="Удалить"><i class="fa fa-trash-o"></i></button>
            </div>
            <?php }?>

            <?php if ($flag == "showUpdate" || $flag =="showInsert") {?>
            <div class="pull-right">
                <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Сохранить"><i class="fa fa-save"></i></button>
                <a href="<?=$this->map['adminCountries']?>" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Отменить"><i class="fa fa-reply"></i></a>
            </div>
            <?php }?>
            <h1><?=$title?></h1>
            <ul class="breadcrumb">
                <li><a href="<?=$this->map['adminHome']?>">Главная</a></li>
                <li><a href="<?=$this->map['adminCountries']?>"><?=$title?></a></li>
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
                <form action="<?=$this->map['adminCountriesDeleteComplete']?>" method="get" enctype="multipart/form-data" id="form-category">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"></td>
                                <td class="text-left">Название страны</td>
                                <td class="text-center">Изменить</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($countries as $country) {?>
                            <tr>
                                <td class="text-center"><input type="checkbox" name="selected<?=$country['id_country']?>" value="<?=$country['id_country']?>"></td>
                                <td class="left"><?=$country['country_name']?></td>
                                <td class="text-right">
                                    <a href="<?=$this->map['adminCountriesUpdate'].$country['id_country']?>" data-toggle="tooltip" title="Редактировать" class="btn btn-primary" data-original-title="Редактировать">
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
                <h3 class="panel-title"><i class="fa fa-pencil"></i><?=$title?></h3>
            </div>
            <div class="panel-body">
                <form action="<?=$this->map['adminCountriesUpdateComplete']?>" method="post" enctype="multipart/form-data" id="form-category" class="form-horizontal">
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-name1">Название категории:</label>
                        <div class="col-sm-10">
                            <input type="text" name="country_name" value="<?=$changeCountry['country_name']?>" placeholder="Название страны:" id="input-name1" class="form-control">
                            <input type="hidden" name="id_country" value="<?=$changeCountry['id_country']?>">
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
                    <form action="<?=$this->map['adminCountriesInsertComplete']?>" method="post" enctype="multipart/form-data" id="form-category" class="form-horizontal">
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-name1">Название категории:</label>
                            <div class="col-sm-10">
                                <input type="text" name="country_name" placeholder="Название страны:" id="input-name1" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php }?>
</div>