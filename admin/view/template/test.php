
<!DOCTYPE html>
<html dir="ltr" lang="ru-RU">
<head>
    <meta charset="UTF-8" />
    <title>Панель управления</title>
    <base href="http://localhost:8888/opencart/admin/" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <script type="text/javascript" src="view/javascript/jquery/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="view/javascript/bootstrap/js/bootstrap.min.js"></script>
    <link href="view/stylesheet/bootstrap.css" type="text/css" rel="stylesheet" />
    <link href="view/javascript/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
    <script src="view/javascript/jquery/datetimepicker/moment.js" type="text/javascript"></script>
    <script src="view/javascript/jquery/datetimepicker/locale/ru.js" type="text/javascript"></script>
    <script src="view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <link href="view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css" type="text/css" rel="stylesheet" media="screen" />
    <link type="text/css" href="view/stylesheet/stylesheet.css" rel="stylesheet" media="screen" />
    <script src="view/javascript/common.js" type="text/javascript"></script>
</head>
<body>
<div id="container">
    <header id="header" class="navbar navbar-static-top">
        <div class="navbar-header">
            <a type="button" id="button-menu" class="pull-left"><i class="fa fa-indent fa-lg"></i></a>
            <a href="http://localhost:8888/opencart/admin/index.php?route=common/dashboard&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we" class="navbar-brand"><img src="view/image/logo.png" alt="ocStore" title="ocStore" /></a></div>
        <ul class="nav pull-right">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><span class="label label-danger pull-left">1</span> <i class="fa fa-bell fa-lg"></i></a>
                <ul class="dropdown-menu dropdown-menu-right alerts-dropdown">
                    <li class="dropdown-header">Заказы</li>
                    <li><a href="http://localhost:8888/opencart/admin/index.php?route=sale/order&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we&amp;filter_order_status=5,1,2,12,3" style="display: block; overflow: auto;"><span class="label label-warning pull-right">0</span>В процессе</a></li>
                    <li><a href="http://localhost:8888/opencart/admin/index.php?route=sale/order&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we&amp;filter_order_status=5,3"><span class="label label-success pull-right">0</span>Завершено</a></li>
                    <li><a href="http://localhost:8888/opencart/admin/index.php?route=sale/return&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we"><span class="label label-danger pull-right">0</span>Возвраты</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Покупатели</li>
                    <li><a href="http://localhost:8888/opencart/admin/index.php?route=report/customer_online&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we"><span class="label label-success pull-right">0</span>Онлайн</a></li>
                    <li><a href="http://localhost:8888/opencart/admin/index.php?route=customer/customer&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we&amp;filter_approved=0"><span class="label label-danger pull-right">0</span>В ожидании</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Товары</li>
                    <li><a href="http://localhost:8888/opencart/admin/index.php?route=catalog/product&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we&amp;filter_quantity=0"><span class="label label-danger pull-right">1</span>Нет в наличии</a></li>
                    <li><a href="http://localhost:8888/opencart/admin/index.php?route=catalog/review&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we&amp;filter_status=0"><span class="label label-danger pull-right">0</span>Отзывы</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Партнерская программа</li>
                    <li><a href="http://localhost:8888/opencart/admin/index.php?route=marketing/affiliate&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we&amp;filter_approved=1"><span class="label label-danger pull-right">0</span>В ожидании</a></li>
                </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-home fa-lg"></i></a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-header">Магазины</li>
                    <li><a href="http://localhost:8888/opencart/" target="_blank">Мой Магазин</a></li>
                </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-life-ring fa-lg"></i></a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-header">Помощь</li>
                    <li><a href="http://ocstore.com/?utm_source=ocstore23" target="_blank">Сайт проекта</a></li>
                    <li><a href="http://docs.ocstore.com/?utm_source=ocstore23" target="_blank">Документация</a></li>
                    <li><a href="https://opencartforum.com/?utm_source=ocstore23" target="_blank">Форум ocStore</a></li>
                </ul>
            </li>
            <li><a href="http://localhost:8888/opencart/admin/index.php?route=common/logout&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we"><span class="hidden-xs hidden-sm hidden-md">Выход</span> <i class="fa fa-sign-out fa-lg"></i></a></li>
        </ul>
    </header>
    <nav id="column-left">
        <div id="profile">
            <div>
                <i class="fa fa-opencart"></i>
            </div>
            <div>
                <h4>John Doe</h4>
                <small>Administrator</small></div>
        </div>
        <ul id="menu">
            <li id="menu-dashboard">
                <a href="http://localhost:8888/opencart/admin/index.php?route=common/dashboard&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we"><i class="fa fa-dashboard fw"></i> <span>Панель управления</span></a>
            </li>
            <li id="menu-catalog">
                <a class="parent"><i class="fa fa-tags fw"></i> <span>Каталог</span></a>
                <ul>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=catalog/category&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Категории</a>
                    </li>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=catalog/product&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Товары</a>
                    </li>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=catalog/recurring&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Периодические платежи</a>
                    </li>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=catalog/filter&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Фильтры</a>
                    </li>
                    <li>
                        <a class="parent">Атрибуты</a>
                        <ul>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=catalog/attribute&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Атрибуты</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=catalog/attribute_group&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Группы атрибутов</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=catalog/option&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Опции</a>
                    </li>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=catalog/manufacturer&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Производители</a>
                    </li>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=catalog/download&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Файлы для скачивания</a>
                    </li>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=catalog/review&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Отзывы</a>
                    </li>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=catalog/information&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Статьи</a>
                    </li>
                </ul>
            </li>
            <li id="menu-extension">
                <a class="parent"><i class="fa fa-puzzle-piece fw"></i> <span>Дополнения</span></a>
                <ul>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=marketplace/opencartforum&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">OpenCartForum магазин</a>
                    </li>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=extension/installer&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Установка дополнений</a>
                    </li>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=extension/extension&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Дополнения</a>
                    </li>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=extension/modification&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Менеджер дополнений</a>
                    </li>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=extension/event&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">События</a>
                    </li>
                </ul>
            </li>
            <li id="menu-design">
                <a class="parent"><i class="fa fa-television fw"></i> <span>Дизайн</span></a>
                <ul>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=design/layout&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Схемы</a>
                    </li>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=design/banner&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Баннеры</a>
                    </li>
                </ul>
            </li>
            <li id="menu-sale">
                <a class="parent"><i class="fa fa-shopping-cart fw"></i> <span>Продажи</span></a>
                <ul>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=sale/order&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Заказы</a>
                    </li>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=sale/recurring&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Периодические платежи</a>
                    </li>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=sale/return&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Возвраты</a>
                    </li>
                    <li>
                        <a class="parent">Сертификаты</a>
                        <ul>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=sale/voucher&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Сертификаты</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=sale/voucher_theme&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Темы сертификатов</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li id="menu-customer">
                <a class="parent"><i class="fa fa-user fw"></i> <span>Покупатели</span></a>
                <ul>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=customer/customer&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Покупатели</a>
                    </li>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=customer/customer_group&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Группы покупателей</a>
                    </li>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=customer/custom_field&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Произвольные поля</a>
                    </li>
                </ul>
            </li>
            <li id="menu-marketing">
                <a class="parent"><i class="fa fa-share-alt fw"></i> <span>Маркетинг</span></a>
                <ul>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=marketing/marketing&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Маркетинг</a>
                    </li>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=marketing/affiliate&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Партнеры</a>
                    </li>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=marketing/coupon&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Купоны</a>
                    </li>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=marketing/contact&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Почтовая рассылка</a>
                    </li>
                </ul>
            </li>
            <li id="menu-system">
                <a class="parent"><i class="fa fa-cog fw"></i> <span>Система</span></a>
                <ul>
                    <li>
                        <a href="http://localhost:8888/opencart/admin/index.php?route=setting/store&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Настройки</a>
                    </li>
                    <li>
                        <a class="parent">Пользователи</a>
                        <ul>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=user/user&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Пользователи</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=user/user_permission&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Группы пользователей</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=user/api&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">API</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="parent">Локализация</a>
                        <ul>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=localisation/location&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Адрес магазина</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=localisation/language&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Языки</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=localisation/currency&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Валюты</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=localisation/stock_status&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Состояние на складе</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=localisation/order_status&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Статусы заказов</a>
                            </li>
                            <li>
                                <a class="parent">Возвраты</a>
                                <ul>
                                    <li><a href="http://localhost:8888/opencart/admin/index.php?route=localisation/return_status&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Статусы</a></li>
                                    <li><a href="http://localhost:8888/opencart/admin/index.php?route=localisation/return_action&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Операции</a></li>
                                    <li><a href="http://localhost:8888/opencart/admin/index.php?route=localisation/return_reason&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Причины</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=localisation/country&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Страны</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=localisation/zone&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Регионы</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=localisation/geo_zone&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Географические зоны</a>
                            </li>
                            <li>
                                <a class="parent">Налоги</a>
                                <ul>
                                    <li><a href="http://localhost:8888/opencart/admin/index.php?route=localisation/tax_class&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Налоговые классы</a></li>
                                    <li><a href="http://localhost:8888/opencart/admin/index.php?route=localisation/tax_rate&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Налоговые ставки</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=localisation/length_class&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Единицы длины</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=localisation/weight_class&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Единицы веса</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="parent">Инструменты</a>
                        <ul>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=tool/upload&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Загрузки</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=tool/backup&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Бэкап / Восстановление</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=tool/log&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Журнал ошибок</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=octeam/toolset&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">OC Team</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li id="menu-report">
                <a class="parent"><i class="fa fa-bar-chart-o fw"></i> <span>Отчеты</span></a>
                <ul>
                    <li>
                        <a class="parent">Продажи</a>
                        <ul>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=report/sale_order&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Заказы</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=report/sale_tax&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Налоги</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=report/sale_shipping&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Доставка</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=report/sale_return&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Возвраты</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=report/sale_coupon&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Купоны</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="parent">Товары</a>
                        <ul>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=report/product_viewed&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Просмотренные</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=report/product_purchased&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Купленные</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="parent">Покупатели</a>
                        <ul>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=report/customer_online&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Онлайн</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=report/customer_activity&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Активность</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=report/customer_search&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Поисковые запросы</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=report/customer_order&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Заказы</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=report/customer_reward&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Бонусные баллы</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=report/customer_credit&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Кредит</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="parent">Маркетинг</a>
                        <ul>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=report/marketing&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Маркетинг</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=report/affiliate&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Партнёры</a>
                            </li>
                            <li>
                                <a href="http://localhost:8888/opencart/admin/index.php?route=report/affiliate_activity&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Активность</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        <div id="stats">
            <ul>
                <li>
                    <div>Выполненных заказов <span class="pull-right">0%</span></div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"> <span class="sr-only">0%</span></div>
                    </div>
                </li>
                <li>
                    <div>Заказов в обработке <span class="pull-right">0%</span></div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"> <span class="sr-only">0%</span></div>
                    </div>
                </li>
                <li>
                    <div>Другие статусы <span class="pull-right">0%</span></div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"> <span class="sr-only">0%</span></div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div id="content">
        <div class="page-header">
            <div class="container-fluid">
                <h1>Панель управления</h1>
                <ul class="breadcrumb">
                    <li><a href="http://localhost:8888/opencart/admin/index.php?route=common/dashboard&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Главная</a></li>
                    <li><a href="http://localhost:8888/opencart/admin/index.php?route=common/dashboard&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Панель управления</a></li>
                </ul>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6"><div class="tile">
                        <div class="tile-heading">Всего заказов <span class="pull-right">
        0%</span></div>
                        <div class="tile-body"><i class="fa fa-shopping-cart"></i>
                            <h2 class="pull-right">0</h2>
                        </div>
                        <div class="tile-footer"><a href="http://localhost:8888/opencart/admin/index.php?route=sale/order&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Подробнее...</a></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6"><div class="tile">
                        <div class="tile-heading">Всего продаж <span class="pull-right">
        0% </span></div>
                        <div class="tile-body"><i class="fa fa-credit-card"></i>
                            <h2 class="pull-right">0</h2>
                        </div>
                        <div class="tile-footer"><a href="http://localhost:8888/opencart/admin/index.php?route=sale/order&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Подробнее...</a></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6"><div class="tile">
                        <div class="tile-heading">Всего покупателей <span class="pull-right">
        0%</span></div>
                        <div class="tile-body"><i class="fa fa-user"></i>
                            <h2 class="pull-right">0</h2>
                        </div>
                        <div class="tile-footer"><a href="http://localhost:8888/opencart/admin/index.php?route=customer/customer&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Подробнее...</a></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6"><div class="tile">
                        <div class="tile-heading">Покупатели онлайн</div>
                        <div class="tile-body"><i class="fa fa-users"></i>
                            <h2 class="pull-right">0</h2>
                        </div>
                        <div class="tile-footer"><a href="http://localhost:8888/opencart/admin/index.php?route=report/customer_online&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Подробнее...</a></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12"><div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-globe"></i> Продажи по странам</h3>
                        </div>
                        <div class="panel-body">
                            <div id="vmap" style="width: 100%; height: 260px;"></div>
                        </div>
                    </div>
                    <link type="text/css" href="view/javascript/jquery/jqvmap/jqvmap.css" rel="stylesheet" media="screen" />
                    <script type="text/javascript" src="view/javascript/jquery/jqvmap/jquery.vmap.js"></script>
                    <script type="text/javascript" src="view/javascript/jquery/jqvmap/maps/jquery.vmap.world.js"></script>
                    <script type="text/javascript"><!--
                        $(document).ready(function() {
                            $.ajax({
                                url: 'index.php?route=extension/dashboard/map/map&token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we',
                                dataType: 'json',
                                success: function(json) {
                                    data = [];

                                    for (i in json) {
                                        data[i] = json[i]['total'];
                                    }

                                    $('#vmap').vectorMap({
                                        map: 'world_en',
                                        backgroundColor: '#FFFFFF',
                                        borderColor: '#FFFFFF',
                                        color: '#9FD5F1',
                                        hoverOpacity: 0.7,
                                        selectedColor: '#666666',
                                        enableZoom: true,
                                        showTooltip: true,
                                        values: data,
                                        normalizeFunction: 'polynomial',
                                        onLabelShow: function(event, label, code) {
                                            if (json[code]) {
                                                label.html('<strong>' + label.text() + '</strong><br />' + 'Заказы ' + json[code]['total'] + '<br />' + 'Продажи ' + json[code]['amount']);
                                            }
                                        }
                                    });
                                },
                                error: function(xhr, ajaxOptions, thrownError) {
                                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                                }
                            });
                        });
                        //--></script> </div>
                <div class="col-lg-6 col-md-12 col-sm-12"><div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="pull-right"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-calendar"></i> <i class="caret"></i></a>
                                <ul id="range" class="dropdown-menu dropdown-menu-right">
                                    <li><a href="day">Сегодня</a></li>
                                    <li><a href="week">За неделю</a></li>
                                    <li class="active"><a href="month">За месяц</a></li>
                                    <li><a href="year">За этот год</a></li>
                                </ul>
                            </div>
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Статистика продаж</h3>
                        </div>
                        <div class="panel-body">
                            <div id="chart-sale" style="width: 100%; height: 260px;"></div>
                        </div>
                    </div>
                    <script type="text/javascript" src="view/javascript/jquery/flot/jquery.flot.js"></script>
                    <script type="text/javascript" src="view/javascript/jquery/flot/jquery.flot.resize.min.js"></script>
                    <script type="text/javascript"><!--
                        $('#range a').on('click', function(e) {
                            e.preventDefault();

                            $(this).parent().parent().find('li').removeClass('active');

                            $(this).parent().addClass('active');

                            $.ajax({
                                type: 'get',
                                url: 'index.php?route=extension/dashboard/chart/chart&token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we&range=' + $(this).attr('href'),
                                dataType: 'json',
                                success: function(json) {
                                    if (typeof json['order'] == 'undefined') { return false; }
                                    var option = {
                                        shadowSize: 0,
                                        colors: ['#9FD5F1', '#1065D2'],
                                        bars: {
                                            show: true,
                                            fill: true,
                                            lineWidth: 1
                                        },
                                        grid: {
                                            backgroundColor: '#FFFFFF',
                                            hoverable: true
                                        },
                                        points: {
                                            show: false
                                        },
                                        xaxis: {
                                            show: true,
                                            ticks: json['xaxis']
                                        }
                                    }

                                    $.plot('#chart-sale', [json['order'], json['customer']], option);

                                    $('#chart-sale').bind('plothover', function(event, pos, item) {
                                        $('.tooltip').remove();

                                        if (item) {
                                            $('<div id="tooltip" class="tooltip top in"><div class="tooltip-arrow"></div><div class="tooltip-inner">' + item.datapoint[1].toFixed(2) + '</div></div>').prependTo('body');

                                            $('#tooltip').css({
                                                position: 'absolute',
                                                left: item.pageX - ($('#tooltip').outerWidth() / 2),
                                                top: item.pageY - $('#tooltip').outerHeight(),
                                                pointer: 'cusror'
                                            }).fadeIn('slow');

                                            $('#chart-sale').css('cursor', 'pointer');
                                        } else {
                                            $('#chart-sale').css('cursor', 'auto');
                                        }
                                    });
                                },
                                error: function(xhr, ajaxOptions, thrownError) {
                                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                                }
                            });
                        });

                        $('#range .active a').trigger('click');
                        //--></script> </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12"><div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-calendar"></i> Последняя активность</h3>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item text-center">Нет данных!</li>
                        </ul>
                    </div></div>
                <div class="col-lg-8 col-md-12 col-sm-12"><div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> Последние заказы</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <td class="text-right">Заказ №</td>
                                    <td>Покупатель</td>
                                    <td>Статус</td>
                                    <td>Дата заказа</td>
                                    <td class="text-right">На сумму</td>
                                    <td class="text-right">Действие</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center" colspan="6">Нет данных!</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer id="footer"><a target="_blank" href="http://ocstore.com/?utm_source=ocstore23">ocStore</a> &copy; 2009-2021 Все права защищены.<br />Версия ocStore 2.3.0.2.4<br/>Максимальная производительность <a target="_blank" href="https://turbohost.pro/?utm_source=ocstore23">TurboHost.pro</a></footer>
</div>
</body>
</html>