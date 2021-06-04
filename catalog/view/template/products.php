<div class="container">
    <h3>Рекомендуем</h3>
    <div class="row">
        <?php foreach ($productsArrayOnMainPage as $product){?>
            <div class="product-layout col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="product-thumb transition">
                    <div class="image"><a href="#"><img
                                    src="../view/image/<?=$product['path']?>" alt="MacBook"
                                    title="<?=$product['model_name']?>"
                                    class="img-responsive"></a></div>
                    <div class="caption">
                        <h4><a href="#"><?=$product['category_name']?> <?=$product['model_name']?></a></h4>
                        <p><?=$product['description']?></p>
                        <p class="price">ЦЕНА - <?=$product['price']?>,00 р. <span class="price-tax">Без НДС:<?=$product['price']?>,00 р.</span></p></div>
                    <div class="button-group">
                        <button type="button"  data-toggle="tooltip"
                                data-original-title="Добавить в корзину"><i class="fa fa-shopping-cart"></i> <span
                                    class="hidden-xs hidden-sm hidden-md">Купить</span></button>
                        <button type="button" data-toggle="tooltip" title=""
                                data-original-title="Оформить быстрый заказ этого товара"><i class="fa fa-check-square-o"></i></button>
                        <button type="button" data-toggle="tooltip" title=""
                                data-original-title="Посмотреть информацию о товаре"><i class="fa fa-info-circle"></i></button>
                    </div>
                </div>
            </div>
        <?}?>
    </div>
</div>