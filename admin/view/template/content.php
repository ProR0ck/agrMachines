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
                <link type="text/css" href="view/javascript/jquery/jqvmap/jqvmap.css" rel="stylesheet" media="screen">
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