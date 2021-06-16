<div class="container-fluid"><br>
    <br>
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title"><i class="fa fa-lock"></i> Введите логин и пароль</h1>
                </div>
                <div class="panel-body">
                    <form action="<?=$route->map['adminSignIn']?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="input-username">Логин</label>
                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="log" value="" placeholder="Логин" id="input-username" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-password">Пароль</label>
                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" name="pass" value="" placeholder="Пароль" id="input-password" class="form-control">
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-key"></i> Войти</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>