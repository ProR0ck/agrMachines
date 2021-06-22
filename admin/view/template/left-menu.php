<nav id="column-left">
    <div id="profile">
        <div>
            <i class="fa fa-user" aria-hidden="true"></i>
        </div>
        <div>
            <h4><?= $_SESSION['surname'] ?> <?= $_SESSION['user_name'] ?></h4>
            <small><?= $_SESSION['role_name'] ?></small></div>
    </div>
    <ul id="menu">
        <li id="menu-dashboard">
            <a href="<?= $this->map['adminHome'] ?>"><i class="fa fa-dashboard fw"></i>
                <span>Панель управления</span></a>
        </li>
        <li id="menu-catalog">
            <a class="parent"><i class="fa fa-tags fw"></i> <span>Каталог</span></a>
            <ul class="collapse">
                <li>
                    <a href="<?= $this->map['adminCategories'] ?>">Категории</a>
                </li>
                <li>
                    <a class="parent">Товары</a>
                    <ul>
                        <li>
                            <a href="<?= $this->map['adminProducts'] ?>">Товары</a>
                        </li>
                        <li>
                            <a href="http://localhost:8888/opencart/admin/index.php?route=catalog/attribute_group&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Марки</a>
                        </li>
                        <li>
                            <a href="http://localhost:8888/opencart/admin/index.php?route=catalog/attribute_group&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Модели</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="http://localhost:8888/opencart/admin/index.php?route=catalog/manufacturer&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Атрибуты</a>
                </li>
                <li>
                    <a href="http://localhost:8888/opencart/admin/index.php?route=catalog/manufacturer&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Производители</a>
                </li>
                <li>
                    <a href="http://localhost:8888/opencart/admin/index.php?route=catalog/manufacturer&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Салоны</a>
                </li>
            </ul>
        </li>
        <li id="menu-sale">
            <a class="parent"><i class="fa fa-shopping-cart fw"></i> <span>Продажи</span></a>
            <ul class="collapse">
                <li>
                    <a href="<?=$this->map['adminOrders']?>">Заказы</a>
                </li>
            </ul>
        </li>
        <li id="menu-customer">
            <a class="parent"><i class="fa fa-user fw"></i> <span>Полльзователи</span></a>
            <ul class="collapse">
                <li>
                    <a href="http://localhost:8888/opencart/admin/index.php?route=customer/customer&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Покупатели</a>
                </li>
                <li>
                    <a href="http://localhost:8888/opencart/admin/index.php?route=customer/customer&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Администраторы</a>
                </li>
            </ul>
        </li>
        <li id="menu-report">
            <a class="parent"><i class="fa fa-bar-chart-o fw"></i> <span>Отчеты</span></a>
            <ul class="collapse">
                <li>
                    <a href="<?=$this->map['adminReport']?>">Продажи</a>
                </li>
            </ul>
        </li>
        <li id="menu-system">
            <a class="parent"><i class="fa fa-book"></i> <span>Справочники</span></a>
            <ul>
                <li>
                    <a href="http://localhost:8888/opencart/admin/index.php?route=setting/store&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Цвета</a>
                </li>
                <li>
                    <a href="http://localhost:8888/opencart/admin/index.php?route=setting/store&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Страны</a>
                </li>
                <li>
                    <a href="http://localhost:8888/opencart/admin/index.php?route=setting/store&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Единицы
                        измерения</a>
                </li>
                <li>
                    <a href="http://localhost:8888/opencart/admin/index.php?route=setting/store&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Способы
                        доставки</a>
                </li>
                <li>
                    <a href="http://localhost:8888/opencart/admin/index.php?route=setting/store&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Способы
                        оплаты</a>
                </li>
                <li>
                    <a href="http://localhost:8888/opencart/admin/index.php?route=setting/store&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Статусы
                        заказа</a>
                </li>
                <li>
                    <a href="http://localhost:8888/opencart/admin/index.php?route=setting/store&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Статусы
                        товара</a>
                </li>
                <li>
                    <a href="http://localhost:8888/opencart/admin/index.php?route=setting/store&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Список
                        полов</a>
                </li>
                <li>
                    <a href="http://localhost:8888/opencart/admin/index.php?route=setting/store&amp;token=3qtlvNhv2UMY5j3EEXe8SPiT6VYrE5we">Список
                        ролей</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>