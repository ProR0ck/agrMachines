<div class="container">
    <ul class="breadcrumb">
        <li><a href="<?= $route->map['home'] ?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?= $route->map['account'] ?>">Личный кабинет</a></li>
    </ul>
    <h1>Личный кабинет полльзователя</h1>
    <hr>
    <h3><?= $_SESSION['surname'] ?> <?= $_SESSION['user_name'] ?> <?= $_SESSION['patronymic'] ?></h3>
    <div class="row">
        <div class="col-sm-3">
            <ul>
                <li><a href="<?= $route->map['userInfo'] ?>">Персональные данные</a></li>
                <li><a href="<?= $route->map['history'] ?>">История заказов</a></li>
            </ul>
        </div>
    </div>
</div>