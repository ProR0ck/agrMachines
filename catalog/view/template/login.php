<div class="container">
    <ul class="breadcrumb">
        <li><a href="<?= $route->map['home'] ?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?= $route->map['login'] ?>">Личный кабинет</a></li>
        <li><a href="<?= $route->map['login'] ?>"">Авторизация</a></li>
    </ul>
    <?php if (isset($result) && $result != null) { ?>
        <div class="alert alert-success" role="alert">
            <i class="fa fa-refresh fa-spin"></i> Регистрация выполненна успешно! Авторизуйтесь в
            <a href="<?= $route->map['login'] ?>">личном кабинете</a>.
        </div>
    <?php } ?>
    <div class="row">
        <div id="content" class="col-sm-9">
            <div class="row">
                <div class="col-sm-6">
                    <div class="well">
                        <h2>Новый пользователь</h2>
                        <p><strong>Регистрация</strong></p>
                        <p>Создание учетной записи поможет делать следующие покупки быстрее (не надо будет снова вводить
                            адрес и контактную информацию), видеть состояние заказа, а также видеть заказы, сделанные
                            ранее. Вы также сможете накапливать при покупках призовые баллы (на них тоже можно что-то
                            купить), а постоянным покупателям мы предлагаем систему скидок.</p>
                        <a href="<?= $route->map['register'] ?>" class="btn btn-primary">Продолжить</a></div>
                </div>
                <div class="col-sm-6">
                    <div class="well">
                        <h2>Я уже зарегистрирован</h2>
                        <p><strong>Авторизация</strong></p>
                        <form action="<?= $route->map['logChek'] ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label" for="input-email">E-Mail:</label>
                                <input type="text" name="log" value="" placeholder="E-Mail:" id="input-email"
                                       class="form-control">
                                <?php if (isset($result) && $result == false) { ?>
                                    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i>
                                        Неправильный логин и/или пароль!
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="input-password">Пароль:</label>
                                <input type="password" name="pass" value="" placeholder="Пароль:" id="input-password"
                                       class="form-control">
                            </div>
                            <input type="hidden" name="login">
                            <input type="submit" value="Войти" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
