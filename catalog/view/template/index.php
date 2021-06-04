<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="../javascript/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
    <link href="../javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
    <script src="../javascript/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <link href="../javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css"/>
    <link href="../stylesheet/stylesheet.css" rel="stylesheet">
    <script src="../javascript/common.js" type="text/javascript"></script>
</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div id="logo"> <img src="http://localhost/image/catalog/opencart-logo.png" title="Ваш магазин"
                                    alt="Ваш магазин" class="img-responsive">
                </div>
            </div>
            <div class="col-sm-5">
                <div id="search" class="input-group">
                    <input type="text" name="search" value="" placeholder="Поиск" class="form-control input-lg">
                    <span class="input-group-btn">
    <button type="button" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
  </span>
                </div>
            </div>
            <div class="col-sm-3">
                <div id="cart" class="btn-group btn-block">
                    <button type="button" data-toggle="dropdown" data-loading-text="Загрузка..."
                            class="btn btn-inverse btn-block btn-lg dropdown-toggle"><i class="fa fa-shopping-cart"></i>
                        <span id="cart-total">Товаров: 0 (0.00р.)</span></button>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <p class="text-center">Ваша корзина пуста!</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="container">
    <nav id="menu" class="navbar">
        <div class="navbar-header"><span id="category" class="visible-xs">{{ text_category }}</span>
            <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ category.href }}">{{ category.name }}</a></li>
                <li><a href="{{ category.href }}">{{ category.name }}</a></li>
                <li><a href="{{ category.href }}">{{ category.name }}</a></li>
                <li>

                </li>
            </ul>
        </div>
    </nav>
</div>
<div class="container">
    <div class="row">
        <div class="product-layout col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="product-thumb transition">
                <div class="image"><a href="http://localhost/index.php?route=product/product&amp;product_id=43"><img
                        src="http://localhost/image/cache/catalog/demo/macbook_1-200x200.jpg" alt="MacBook"
                        title="MacBook"
                        class="img-responsive"></a></div>
                <div class="caption">
                    <h4><a href="http://localhost/index.php?route=product/product&amp;product_id=43">MacBook</a></h4>
                    <p>

                        Intel Core 2 Duo processor

                        Powered by an Intel Core 2 Duo processor at speeds up to 2.1..</p>
                    <p class="price">500.00р. <span class="price-tax">Без НДС:500.00р.</span></p></div>
                <div class="button-group">
                    <button type="button" onclick="cart.add('43');"><i class="fa fa-shopping-cart"></i> <span
                            class="hidden-xs hidden-sm hidden-md">Купить</span></button>
                    <button type="button" data-toggle="tooltip" title="" onclick="wishlist.add('43');"
                            data-original-title="В закладки"><i class="fa fa-heart"></i></button>
                    <button type="button" data-toggle="tooltip" title="" onclick="compare.add('43');"
                            data-original-title="В сравнение"><i class="fa fa-exchange"></i></button>
                </div>
            </div>
        </div>
        <div class="product-layout col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="product-thumb transition">
                <div class="image"><a href="http://localhost/index.php?route=product/product&amp;product_id=40"><img
                        src="http://localhost/image/cache/catalog/demo/iphone_1-200x200.jpg" alt="iPhone" title="iPhone"
                        class="img-responsive"></a></div>
                <div class="caption">
                    <h4><a href="http://localhost/index.php?route=product/product&amp;product_id=40">iPhone</a></h4>
                    <p>
                        iPhone is a revolutionary new mobile phone that allows you to make a call by simply tapping a
                        nam..</p>
                    <p class="price">101.00р. <span class="price-tax">Без НДС:101.00р.</span></p></div>
                <div class="button-group">
                    <button type="button" onclick="cart.add('40');"><i class="fa fa-shopping-cart"></i> <span
                            class="hidden-xs hidden-sm hidden-md">Купить</span></button>
                    <button type="button" data-toggle="tooltip" title="" onclick="wishlist.add('40');"
                            data-original-title="В закладки"><i class="fa fa-heart"></i></button>
                    <button type="button" data-toggle="tooltip" title="" onclick="compare.add('40');"
                            data-original-title="В сравнение"><i class="fa fa-exchange"></i></button>
                </div>
            </div>
        </div>
        <div class="product-layout col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="product-thumb transition">
                <div class="image"><a href="http://localhost/index.php?route=product/product&amp;product_id=42"><img
                        src="http://localhost/image/cache/catalog/demo/apple_cinema_30-200x200.jpg"
                        alt="Apple Cinema 30&quot;" title="Apple Cinema 30&quot;" class="img-responsive"></a></div>
                <div class="caption">
                    <h4><a href="http://localhost/index.php?route=product/product&amp;product_id=42">Apple Cinema
                        30"</a>
                    </h4>
                    <p>
                        The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed
                        sp..</p>
                    <p class="price"><span class="price-new">90.00р.</span> <span class="price-old">100.00р.</span>
                        <span
                                class="price-tax">Без НДС:90.00р.</span></p></div>
                <div class="button-group">
                    <button type="button" onclick="cart.add('42');"><i class="fa fa-shopping-cart"></i> <span
                            class="hidden-xs hidden-sm hidden-md">Купить</span></button>
                    <button type="button" data-toggle="tooltip" title="" onclick="wishlist.add('42');"
                            data-original-title="В закладки"><i class="fa fa-heart"></i></button>
                    <button type="button" data-toggle="tooltip" title="" onclick="compare.add('42');"
                            data-original-title="В сравнение"><i class="fa fa-exchange"></i></button>
                </div>
            </div>
        </div>
        <div class="product-layout col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="product-thumb transition">
                <div class="image"><a href="http://localhost/index.php?route=product/product&amp;product_id=30"><img
                        src="http://localhost/image/cache/catalog/demo/canon_eos_5d_1-200x200.jpg" alt="Canon EOS 5D"
                        title="Canon EOS 5D" class="img-responsive"></a></div>
                <div class="caption">
                    <h4><a href="http://localhost/index.php?route=product/product&amp;product_id=30">Canon EOS 5D</a>
                    </h4>
                    <p>
                        Canon's press material for the EOS 5D states that it 'defines (a) new D-SLR category', while
                        we'r..</p>
                    <p class="price"><span class="price-new">80.00р.</span> <span class="price-old">100.00р.</span>
                        <span
                                class="price-tax">Без НДС:80.00р.</span></p></div>
                <div class="button-group">
                    <button type="button" onclick="cart.add('30');"><i class="fa fa-shopping-cart"></i> <span
                            class="hidden-xs hidden-sm hidden-md">Купить</span></button>
                    <button type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30');"
                            data-original-title="В закладки"><i class="fa fa-heart"></i></button>
                    <button type="button" data-toggle="tooltip" title="" onclick="compare.add('30');"
                            data-original-title="В сравнение"><i class="fa fa-exchange"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="container">
        <div class="row">
            {% if informations %}
            <div class="col-sm-3">
                <h5>{{ text_information }}</h5>
                <ul class="list-unstyled">
                    {% for information in informations %}
                    <li><a href="{{ information.href }}">{{ information.title }}</a></li>
                    {% endfor %}
                </ul>
            </div>
            {% endif %}
            <div class="col-sm-3">
                <h5>{{ text_service }}</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ contact }}">{{ text_contact }}</a></li>
                    <li><a href="{{ return }}">{{ text_return }}</a></li>
                    <li><a href="{{ sitemap }}">{{ text_sitemap }}</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>{{ text_extra }}</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ manufacturer }}">{{ text_manufacturer }}</a></li>
                    <li><a href="{{ voucher }}">{{ text_voucher }}</a></li>
                    <li><a href="{{ affiliate }}">{{ text_affiliate }}</a></li>
                    <li><a href="{{ special }}">{{ text_special }}</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>{{ text_account }}</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ account }}">{{ text_account }}</a></li>
                    <li><a href="{{ order }}">{{ text_order }}</a></li>
                    <li><a href="{{ wishlist }}">{{ text_wishlist }}</a></li>
                    <li><a href="{{ newsletter }}">{{ text_newsletter }}</a></li>
                </ul>
            </div>
        </div>
        <hr>
        <p>Developer - ProR0ck</p>
    </div>
</footer>
</body>
</html>