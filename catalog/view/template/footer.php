<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h5>Мессенджеры</h5>
                <ul class="list-unstyled">
                    <li><a href="#"><i class="fa fa-instagram"></i> instagram</a></li>
                    <li><a href="#"><i class="fa fa-vk"></i> Вконтакте</a></li>
                    <li><a href="#"><i class="fa fa-telegram"></i> telegram</a></li>
                    <li><a href="#"><i class="fa fa-whatsapp"></i> whatsapp</a></li>
                </ul>
            </div>

            <div class="col-sm-3">
                <h5>Поддержка</h5>
                <ul class="list-unstyled">
                    <li><a href="#"><i class="fa fa-phone"></i> +7 (499)-777-77-77</a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i> agromachines@gmail.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> Москва, Бакунинская 81</a></li>
                    <li><a href="#"><i class="fa fa-calendar"></i> пн-пт 09:00-18:00</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>Дополнительно</h5>
                <ul class="list-unstyled">
                    <li><a href="#">О нас</a></li>
                    <li><a href="#">Производители</a></li>
                    <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> Салоны</a></li>
                    <li><a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i> Отзывы клиентов</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>Вход для пользователей</h5>
                <ul class="list-unstyled">
                    <li><a href="<?= $route->map['adminAuth'] ?>"><i class="fa fa-lock" aria-hidden="true"></i>
                            Администратор</a></li>
                    <?php if (!isset($_SESSION['log'])) { ?>
                        <li><a href="<?= $route->map['login'] ?>"><i class="fa fa-user" aria-hidden="true"></i>
                                Клиент</a></li>
                    <?php } else { ?>
                        <li><a href="<?= $route->map['userInfo'] ?>"><i class="fa fa-user"
                                                                        aria-hidden="true"></i> <?= $_SESSION['user_name'] ?> <?= $_SESSION['surname'] ?>
                            </a></li>
                        <li><a href="<?= $route->map['history'] ?>"><i class="fa fa-history" aria-hidden="true"></i>
                                История заказов</a></li>
                        <li><a href="<?= $route->map['logout'] ?>"><i class="fa fa-sign-out" aria-hidden="true"></i>
                                Выход</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <hr>
        <p>Developer - Antonova</p>
    </div>
</footer>
</body>
</html>