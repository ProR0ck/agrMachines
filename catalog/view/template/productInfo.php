<div class="container">
    <ul class="breadcrumb">
        <li><a href="<?=$link?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?=$route->map['category'].$productInfo['id_category']?>"><?=$productInfo['category_name']?></a></li>
        <li><a href="<?=$route->map['product'].$productInfo['id_vehicle']?>"><?=$title?></a></li>
    </ul>
    <div class="col-sm-8">
        <ul class="thumbnails">
            <li>
                <a class="thumbnail" href="<?=$link?>/catalog/view/image/<?=$productMainPhoto['path']?>" title="Apple Cinema 30&quot;"><img src="<?=$link?>/catalog/view/image/<?=$productMainPhoto['path']?>" title="Apple Cinema 30&quot;" alt="Apple Cinema 30&quot;"></a>
            </li>
            <?php foreach ($productPhotos as $photo) {?>
                <li class="image-additional">
                    <a class="thumbnail" href="<?=$link?>/catalog/view/image/<?=$photo['path']?>" title="Apple Cinema 30&quot;">
                        <img src="<?=$link?>/catalog/view/image/<?=$photo['path']?>" title="Apple Cinema 30&quot;" alt="Apple Cinema 30&quot;">
                    </a>
                </li>
            <?php }?>
        </ul>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-description" data-toggle="tab" aria-expanded="true">Описание</a></li>
            <li class=""><a href="#tab-specification" data-toggle="tab" aria-expanded="false">Характеристики</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab-description"><?=$productInfo['description']?></div>
            <div class="tab-pane" id="tab-specification">
                <table class="table table-bordered">
                    <tbody>
                    <?php foreach ($productAtributes as $atribute){?>
                    <tr>
                        <td><?=$atribute['attribute_name']?></td>
                        <td><?=$atribute['value']?> <?=$atribute['unit_symbol']?></td>
                    </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <h1><?=$title?></h1>
        <ul class="list-unstyled">
            <li>Производитель: <a href="#"><?=$productInfo['manufacturer_name']?></a></li>
            <li>Страна: <a href="#"><?=$productInfo['country_name']?></a></li>
            <li>Код товара: Товар <?=$productInfo['id_vehicle']?></li>
            <li>VIN: <strong><?=$productInfo['VIN']?></strong></li>
            <li>Доступность: <?=$productInfo['stock_status_value']?></li>
            <li><h2><?=$productInfo['price']?></h2></li>
            <li><button type="button" id="button-cart" data-loading-text="Загрузка..." class="btn btn-primary btn-lg btn-block" onclick="window.location.href = '<?=$link?>/add-to-basket/<?=$productInfo['id_vehicle']?>';">
                    В корзину
                </button>
            </li>
        </ul>
    </div>
</div>
