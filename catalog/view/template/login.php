<div class="container">
    <ul class="breadcrumb">
        <li><a href="<?=$route->map['home']?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?=$route->map['login']?>">Личный кабинет</a></li>
        <li><a href="<?=$route->map['login']?>"">Авторизация</a></li>
    </ul>
    <?php if(isset($chek) && $chek == true) {?>
        <div class="alert alert-success" role="alert">
            <i class="fa fa-refresh fa-spin"></i> Регистрация прошла успешно! Выполните вход в личный кабинет.
        </div>
    <?php }?>
    <div class="row">                <div id="content" class="col-sm-9">      <div class="row">
                <div class="col-sm-6">
                    <div class="well">
                        <h2>Новый пользователь</h2>
                        <p><strong>Регистрация</strong></p>
                        <p>Создание учетной записи поможет делать следующие покупки быстрее (не надо будет снова вводить адрес и контактную информацию), видеть состояние заказа, а также видеть заказы, сделанные ранее. Вы также сможете накапливать при покупках призовые баллы (на них тоже можно что-то купить), а постоянным покупателям мы предлагаем систему скидок.</p>
                        <a href="<?=$route->map['register']?>" class="btn btn-primary">Продолжить</a></div>
                </div>
                <div class="col-sm-6">
                    <div class="well">
                        <h2>Я уже зарегистрирован</h2>
                        <p><strong>Авторизация</strong></p>
                        <form action="http://localhost:8888/opencart/index.php?route=account/login" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label" for="input-email">E-Mail:</label>
                                <input type="text" name="email" value="" placeholder="E-Mail:" id="input-email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="input-password">Пароль:</label>
                                <input type="password" name="password" value="" placeholder="Пароль:" id="input-password" class="form-control">
                            </div>
                            <input type="submit" value="Войти" class="btn btn-primary">
                            <input type="hidden" name="redirect" value="http://localhost:8888/opencart/index.php?route=account/account">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
