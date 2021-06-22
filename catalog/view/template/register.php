<div class="container">
    <ul class="breadcrumb">
        <li><a href="<?= $route->map['home'] ?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?php if (isset($_SESSION['log'])) echo $route->map['account']; else echo $route->map['login'] ?>">Личный
                кабинет</a></li>
        <?php if (isset($_SESSION['log'])) { ?>
            <li>
                <a href="<?= $route->map['userInfo'] ?>"><?= $_SESSION['surname'] ?> <?= $_SESSION['user_name'] ?> <?= $_SESSION['patronymic'] ?></a>
            </li>
        <?php } else { ?>
            <li><a href="<?= $route->map['register'] ?>">регистрация</a></li>
        <?php } ?>
    </ul>
    <?php if (isset($result) && $result != null) { ?>
        <div class="alert alert-success" role="alert">
            <i class="fa fa-refresh fa-spin"></i> Добро
            пожаловать, <?= $_SESSION['surname'] ?> <?= $_SESSION['user_name'] ?> <?= $_SESSION['patronymic'] ?>
        </div>
    <?php } ?>
    <?php if (isset($updateResult) && $updateResult != false) { ?>
        <div class="alert alert-success" role="alert">
            <i class="fa fa-refresh fa-spin"></i> Данные успешно изменены
        </div>
    <?php } ?>

    <div class="row">
        <div id="content" class="col-sm-9">
            <?php if (isset($_SESSION['log'])) { ?>
                <h3><?= $_SESSION['surname'] ?> <?= $_SESSION['user_name'] ?> <?= $_SESSION['patronymic'] ?></h3>
            <?php } else { ?>
                <h1>Регистрация</h1>
                <p>Если вы уже зарегистрированы, перейдите на страницу <a
                            href="<?= $route->map['login'] ?>">авторизации</a>.</p>
            <?php } ?>
            <form action="<?= $route->map['registerChek'] ?>" method="post" class="form-horizontal">
                <fieldset id="account">
                    <legend>Основные данные</legend>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-firstname">Имя</label>
                        <div class="col-sm-10">
                            <input type="text" name="name"
                                   value="<?php if (isset($data['name'])) echo $data['name']; elseif (isset($_SESSION['user_name'])) echo $_SESSION['user_name'] ?>"
                                   placeholder="Имя" id="name" class="form-control" required>
                            <?php if (isset($nameError)) { ?>
                                <div class="text-danger"><?= $nameError ?></div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-lastname">Фамилия</label>
                        <div class="col-sm-10">
                            <input type="text" name="surname"
                                   value="<?php if (isset($data['surname'])) echo $data['surname']; elseif (isset($_SESSION['surname'])) echo $_SESSION['surname'] ?>"
                                   placeholder="Фамилия" id="input-lastname" class="form-control" required>
                            <?php if (isset($surnameError)) { ?>
                                <div class="text-danger"><?= $surnameError ?></div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-lastname">Отчество</label>
                        <div class="col-sm-10">
                            <input type="text" name="patronymic"
                                   value="<?php if (isset($data['patronymic'])) echo $data['patronymic']; elseif (isset($_SESSION['patronymic'])) echo $_SESSION['patronymic'] ?>"
                                   placeholder="Отчество" id="input-lastname" class="form-control" required>
                            <?php if (isset($patronymicError)) { ?>
                                <div class="text-danger"><?= $patronymicError ?></div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                        <div class="col-sm-10">
                            <input type="email" name="e_mail"
                                   value="<?php if (isset($data['e_mail'])) echo $data['e_mail']; elseif (isset($_SESSION['e_mail'])) echo $_SESSION['e_mail'] ?>"
                                   placeholder="E-Mail" id="e_mail" class="form-control">
                            <?php if (isset($e_mailError)) { ?>
                                <div class="text-danger"><?= $e_mailError ?></div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-telephone">Телефон</label>
                        <div class="col-sm-10">
                            <input type="tel" name="phone_number"
                                   value="<?php if (isset($data['phone_number'])) echo $data['phone_number']; elseif (isset($_SESSION['phone_number'])) echo $_SESSION['phone_number'] ?>"
                                   placeholder="+7(___) ___-____" id="phone_number" class="form-control" required>
                            <?php if (isset($phone_numberError)) { ?>
                                <div class="text-danger"><?= $phone_numberError ?></div>
                            <?php } ?>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="address">
                    <legend>Ваш адрес</legend>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-address-1">Адрес</label>
                        <div class="col-sm-10">
                            <input type="text" name="address"
                                   value="<?php if (isset($data['address'])) echo $data['address']; elseif (isset($_SESSION['address'])) echo $_SESSION['address'] ?>"
                                   placeholder="Адрес" id="input-address-1" class="form-control" required>
                            <?php if (isset($addressError)) { ?>
                                <div class="text-danger"><?= $addressError ?></div>
                            <?php } ?>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Ваш пароль</legend>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-password">Пароль</label>
                        <div class="col-sm-10">
                            <input type="password" name="password"
                                   value="<?php if (isset($data['password'])) echo $data['password']; elseif (isset($_SESSION['pass'])) echo $_SESSION['pass'] ?>"
                                   placeholder="Пароль" id="input-password" class="form-control" required>
                            <?php if (isset($passwordError)) { ?>
                                <div class="text-danger"><?= $passwordError ?></div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-confirm">Подтвердить</label>
                        <div class="col-sm-10">
                            <input type="password" name="confirm"
                                   value="<?php if (isset($data['confirm'])) echo $data['confirm']; elseif (isset($_SESSION['pass'])) echo $_SESSION['pass'] ?>"
                                   placeholder="Подтвердить" id="input-confirm" class="form-control" required>
                        </div>
                    </div>
                </fieldset>
                <input type="hidden" name="flag"
                       value="<?php if (isset($_SESSION['log'])) echo 'update'; else echo 'insert' ?>">
                <div class="buttons">
                    <div class="pull-right">
                        <input type="submit"
                               value="<?php if (isset($_SESSION['log'])) echo 'Изменить'; else echo 'Продолжить' ?>"
                               class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("#phone_number").mask("+7(999) 999-9999");
</script>
