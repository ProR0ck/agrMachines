<?php


namespace catalog\config;
use PDO;
class config
{
    private $host = 'localhost';
    private $port = '8889';
    private $dbName = 'agr_machines';
    private $username = 'root';
    private $password = 'root';
    const HOST = 'http://localhost:8888/agrMachines';
    const LOCALHOST = 'http://localhost:8888';

    public function getPdo()
    {
        try {
            return $this->pdo = new PDO("mysql:host=$this->host:$this->port;dbname=$this->dbName", "$this->username", "$this->password");
        } catch (PDOException $e) {
            echo "Невозможно установить соединение с базой данных.";
        }
    }

    public function getMainLink()
    {
        return self::HOST;
    }
}
namespace catalog\models;
class productsModel extends \catalog\config\config
{
    function getProducts($category = null)
    {
        if (!$category)
            $query = "SELECT v.`id_vehicle`, c.`category_name`,cn.`country_name`, mn.`manufacturer_name`,mr.`mark_name`,m.`model_name`, v.`description`, v.`price`,v.`VIN`, p.`path` 
            FROM `vehicles` v, `models` m, `vehicles_photo` p, `categories` c, `marks` mr, `countries` cn,`manufacturer` mn
            WHERE v.`id_model` = m.`id_model`
            AND v.`id_vehicle` = p.`id_vehicle` 
            AND v.`id_category` = c.`id_category`
            AND mr.`id_mark` = m.`id_mark`
            AND v.`id_country` = cn.`id_country`
            AND mn.`id_manufacturer` = v.`id_manufacturer`
            AND p.`is_main` = 1";
        else
            $query = "SELECT v.`id_vehicle`, c.`category_name`,cn.`country_name`, mn.`manufacturer_name`,mr.`mark_name`,m.`model_name`, v.`description`, v.`price`,v.`VIN`, p.`path` 
            FROM `vehicles` v, `models` m, `vehicles_photo` p, `categories` c, `marks` mr, `countries` cn,`manufacturer` mn
            WHERE v.`id_model` = m.`id_model`
            AND v.`id_vehicle` = p.`id_vehicle` 
            AND v.`id_category` = c.`id_category`
            AND mr.`id_mark` = m.`id_mark`
            AND v.`id_country` = cn.`id_country`
            AND mn.`id_manufacturer` = v.`id_manufacturer`
            AND p.`is_main` = 1
            AND v.`id_category` = '{$category}'";
        $productArray = $this->getPdo()->query($query)->fetchAll();
        $i = 0;
        foreach ($productArray as $product) {
            $productArray[$i]['description'] = mb_substr($product['description'], 0, 150) . "...";
            $productArray[$i]['category_name'] = mb_substr($product['category_name'], 0, 11);
            $productArray[$i]['price'] = number_format($productArray[$i]['price'], 2, ',', ' ') . " руб.";
            $i++;
        }
        return $productArray;
    }
    function getInfo($id, $calc = null)
    {
        $query = "SELECT 
            v.`id_vehicle`, 
            c.`category_name`,
            c.`id_category`,
            mr.`mark_name`, 
            m.`model_name`, 
            mn.`manufacturer_name`,
            v.`description`, 
            v.`price`,
            v.`VIN`, 
            p.`path`, 
            s.`stock_status_value`, 
            cn.`country_name`
        FROM 
            `vehicles` v, 
            `models` m, 
            `vehicles_photo` p, 
            `categories` c, 
            `marks` mr, 
            `manufacturer` mn, 
            `stock_status` s, 
            `countries` cn
        WHERE v.`id_model` = m.`id_model` 
            AND v.`id_vehicle` = p.`id_vehicle` 
            AND v.`id_category` = c.`id_category`
            AND m.`id_mark` = mr.`id_mark`
            AND v.`id_manufacturer` = mn.`id_manufacturer`
            AND s.`id_stock_status` = v.`id_stock_status`
            AND v.`id_country` = cn.`id_country`
            AND m.`id_model` = {$id}";

        if (isset($calc)) {
            return $this->getPdo()->query($query)->fetch();
        } else {
            $product = $this->getPdo()->query($query)->fetch();
            $product['price'] = number_format($product['price'], 2, ',', ' ') . " руб.";
            return $product;
        }
    }
    function getMainPhoto($id)
    {
        $query = "SELECT * FROM `vehicles_photo` WHERE `is_main` = '1' AND `id_vehicle` = {$id}";
        return $this->getPdo()->query($query)->fetch();
    }
    function getPhotos($id)
    {
        $query = "SELECT * FROM `vehicles_photo` WHERE `is_main` = '0' AND `id_vehicle` = {$id}";
        return $this->getPdo()->query($query)->fetchAll();
    }
    function getAtributes($id)
    {
        $query = "SELECT a.`attribute_name`, v.`value`, u.`unit_symbol`
        FROM `vehicle_attributes` v
        LEFT JOIN `units` u ON v.`id_unit` = u.`id_unit`
        LEFT JOIN `attribute_list` a ON a.`id_attribute` = v.`id_attribute`
        WHERE v.`id_vehicle` = {$id}";
        return $this->getPdo()->query($query)->fetchAll();
    }
    function getBasketList($calc = null)
    {
        if (isset($_SESSION['basket'])) {
            $productsInBasket = [];
            if (isset($calc)) {
                foreach ($_SESSION['basket'] as $id) {
                    array_push($productsInBasket, $this->getInfo($id, 1));
                }
            } else {
                foreach ($_SESSION['basket'] as $id) {
                    array_push($productsInBasket, $this->getInfo($id));
                }
            }
        } else $productsInBasket = [];
        return $productsInBasket;
    }
    function getBasketTotalPrice($productsInBasket)
    {
        $totalPrice = 0;
        foreach ($productsInBasket as $product) {
            $totalPrice += $product['price'];
        }
        return $totalPrice = number_format($totalPrice, 2, ',', ' ') . " руб.";;
    }
    function search($search)
    {
        $query = "SELECT v.`id_vehicle`, c.`category_name`,m.`model_name`, v.`description`, v.`price`,v.`VIN`, p.`path` 
            FROM `vehicles` v, `models` m, `vehicles_photo` p, `categories` c
            WHERE v.`id_model` = m.`id_model`
            AND v.`id_vehicle` = p.`id_vehicle` 
            AND v.`id_category` = c.`id_category`
            AND p.`is_main` = 1
            AND (c.`category_name` LIKE '%$search%'
                OR m.`model_name` LIKE '%$search%')";
        $productArray = $this->getPdo()->query($query)->fetchAll();
        $i = 0;
        foreach ($productArray as $product) {
            $productArray[$i]['description'] = mb_substr($product['description'], 0, 150) . "...";
            $productArray[$i]['category_name'] = mb_substr($product['category_name'], 0, 11);
            $productArray[$i]['price'] = number_format($productArray[$i]['price'], 2, ',', ' ') . " руб.";
            $i++;
        }
        return $productArray;
    }
}
namespace catalog\models;
class categoriesModel extends \catalog\config\config
{
    public function getName($id = null)
    {
        if (isset($id)){
            $query = "SELECT `category_name` FROM `categories` WHERE `id_category` = '{$id}'";
            return $this->getPdo()->query($query)->fetch()[0];
        }
        else {
            $query = "SELECT * FROM `categories` ORDER BY `categories`.`id_category` ASC";
            return $this->getPdo()->query($query)->fetchAll();
        }
    }
}

$product = new productsModel();
$products = $product->getProducts();
$category = new categoriesModel();
$categories = $category->getName();

?>

<!-- Пишем в соответствии со стандартом HTML5 -->
<!DOCTYPE HTML>
<html>
<head>
    <!-- Пишем заголовок документа -->
    <title>Динамические списки</title>
</head>
<body>
<!-- Форма для динамических списков -->
<form action="" method="post" id="dynamic_selects">
    <!-- Создаем заголовок для списка выбора типов транспорта -->
    <!-- Поле формы помещаем в контейнер с классом row -->
    <div class="row">
        <label for="type">Категория товара:</label>
        <select id="category">
            <option value="0">Выберите из списка</option>
            <?php foreach ($categories as $category) {?>
            <option value="<?=$category['id_category']?>"><?=$category['category_name']?></option>
            <?php }?>
        </select>
    </div>
    <div class="row">
        <label for="manufacturer">Производитель</label>
        <select id="manufacturer" disabled>
            <option value="0">Выберите из списка</option>
        </select>
    </div>
    <div class="row">
        <label for="mark">Марка</label>
        <select id="mark" disabled>
            <option value="0">Выберите из списка</option>
        </select>
    </div>
    <div class="row">
        <label for="model">Модель</label>
        <select id="model" disabled>
            <option value="0">Выберите из списка</option>
        </select>
    </div>
</form>
</body>
</html>


<link rel="stylesheet" type="text/css" href="style.css" />
<!-- Подключаем библеотеку jQuery, которая хранится на сервере Яндекса -->
<script src="http://yandex.st/jquery/1.10.2/jquery.min.js"></script>
<!-- Подключаем файл со своим собственным скриптом -->
<script src="my.script.js"></script>
<script>
    /**
     * @author Evgeni Lezhenkin evgeni@lezhenkin.ru http://lezhenkin.ru
     *
     * В данном сценарии мы будем обрабатывать события выбора значений
     * в списках тега select. Второе и третье поле списка являются зависимыми.
     * При выборе значения в первом поле select должен отправляться AJAX-запрос,
     * который вернет перечень значений для второго списка. Далее эти значения будут
     * помещены во второй select, а сам список станет активным.
     * После выбора значения во втором списке запускается тот же алгоритм, что описан
     * выше.
     *
     * Все AJAX-запросы к серверу будут выполняться через скрипт query.php методом POST
     *
     * Если пользователь меняет значение в первом списке, все поля второго
     * и третьего удаляются, и второй и третий списки становятся неактивными. Если
     * Меняется значение второго списка, то удаляются все значения для третьего,
     * и он становится неактивным.
     *
     * Данный сценарий будет работать во всех броузерах благодаря библеотеке jQuery
     *
     * Здесь не будет описываться синтаксис самого jQuery, синтаксис JavaScript. Также
     * здесь не будет подробно описываться инструментарий
     */
// Используем немедленно вызываемую функцию
    (function () {
        // Будем работать в соответствии с требованиями современного стандарта
        // ECMAScript. Включим строгий режим.
        "use strict";

        // Весь наш основной сценарий будет работать уже после загрузки документа
        jQuery(function () {
            // Пишем обработчик события для выбора значения в первом списке
            // Нас интересует событие изменения значения поля
            $( '#category' ).change(function () {
                // При изменении значения первого списка мы должны удалить
                // все имеющиеся значения во втором и третьем, а также
                // сделать их неактивными
                $( '#manufacturer, #mark, #model' ).find( 'option:not(:first)' )	// Ищем все теги option, не являющиеся тегом по умолчанию
                    .remove()	// Удаляем эти теги
                    // Чтобы сделать поля неактивными, неправильно менять значение атрибута disabled
                    // Теперь нам нужно изменять значение свойства disabled объектов полей списка,
                    // так как мы работаем с ними через библиотеку jQuery
                    .end()		// Возвращаемся к исходному объекту
                    .prop( 'disabled',true );		// Делаем поля неактивными
                // Сохраним выбранное значение списка в переменную
                var id_category = $( this ).val();
                // Если выбрано значение по умолчанию, ничего не делаем
                if (id_category == 0) { return; }
                // В ином случае нам необходимо отправить запрос на сервер
                // AJAX-запрос к серверу мы выполним, используя метод jQuery ajax()
                $.ajax({
                    type: "POST",	// Тип запроса
                    url: "query.php",	// Путь к сценарию, обработающему запрос
                    dataType: "json",	// Тип данных, в которых сервер должен прислать ответ
                    data: "query=getManufacturers&id_category=" + id_category,	// Строка POST-запроса
                    error: function () {	// Обработчик, который будет запущен в случае неудачного запроса
                        alert( "При выполнении запроса произошла ошибка :(" );	// Сообщение о неудачном запросе
                    },
                    success: function ( data ) { // Обработчик, который будет запущен после успешного запроса
                        // В ответ на наш запрос сервер должен прислать массив значений
                        // Мы его вставим в поле второго списка с помощью цикла for
                        for ( var i = 0; i < data.length; i++ ) {
                            // Каждое полученное значение вставим в список видов транспорта
                            $( '#manufacturer' ).append( '<option value="' + data[i].id_manufacturer + '">' + data[i].manufacturer + '</option>' );
                        }
                        // После того, как мы сформировали список, мы можем сделать его активным
                        // обратившись к его свойству disabled
                        $( '#manufacturer' ).prop( 'disabled', false );	// Включаем поле
                    }
                });
            });

            // Пишем обработчик события для выбора значения во втором списке
            // Нас интересует событие изменения значения поля
            $( '#kind' ).change(function () {
                // При изменении значения второго списка мы должны удалить
                // все имеющиеся значения в третьем, а также
                // сделать его неактивными
                $( '#category' ).find( 'option:not(:first)' )	// Ищем все теги option, не являющиеся тегом по умолчанию
                    .remove()	// Удаляем эти теги
                    // Чтобы сделать поле неактивным, неправильно менять значение атрибута disabled
                    // Теперь нам нужно изменять значение свойства disabled объекта поля списка,
                    // так как мы работаем с ним через библиотеку jQuery
                    .end()		// Возвращаемся к исходному объекту
                    .prop( 'disabled',true );		// Делаем поле неактивным
                // Сохраним выбранное значение списка в переменную
                var kind_id = $( this ).val();
                // Сохраним выбранное значение типа транспорта в переменную
                var type_id = $( '#type' ).val();
                // Если выбрано значение по умолчанию, ничего не делаем
                if (type_id === 0) { return; }
                // В ином случае нам необходимо отправить запрос на сервер
                // AJAX-запрос к серверу мы выполним, используя метод jQuery ajax()
                $.ajax({
                    type: "POST",	// Тип запроса
                    url: "query.php",	// Путь к сценарию, обработающему запрос
                    dataType: "json",	// Тип данных, в которых сервер должен прислать ответ
                    data: "query=getCategories&type_id=" + type_id + "&kind_id=" + kind_id,	// Строка POST-запроса
                    error: function () {	// Обработчик, который будет запущен в случае неудачного запроса
                        alert( "При выполнении запроса произошла ошибка :(" );	// Сообщение о неудачном запросе
                    },
                    success: function ( data ) { // Обработчик, который будет запущен после успешного запроса
                        // В ответ на наш запрос сервер должен прислать массив значений
                        // Мы его вставим в поле третьего списка с помощью цикла for
                        for ( var i = 0; i < data.length; i++ ) {
                            // Каждое полученное значение вставим в список категорий транспорта
                            $( '#category' ).append( '<option value="' + data[i].category_id + '">' + data[i].category + '</option>' );
                        }
                        // После того, как мы сформировали список, мы можем сделать его активным
                        // обратившись к его свойству disabled
                        $( '#category' ).prop( 'disabled', false );	// Включаем поле
                    }
                });
            });

            // Никакие обработчичик для поля третьего списка не нужны
        }); // Функция ожидания загрузки документа jQuery
    })(); // Немедленно вызываемая функция
    /**
     * Вы должны понимать, что данный код далек от идеала и является лишь
     * примером решения конкретной задачи — динамического пополнения полей
     * формы select. Здесь опущено очень много моментов, связанных с отладкой,
     * безопасностью и многим другим. И вы должны понимать это очень хорошо.
     * Данный пример просто показывает инструмент, с помощью которого решается
     * озвученная задача.
     */

</script>
