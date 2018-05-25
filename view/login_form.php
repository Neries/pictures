<link href="/css/authform.css" rel="stylesheet">
<div class="form-test">
    <form class="form-signin" method="post" action="login">
        <div class="text-center mb-4">
            <img class="mb-4" src="/img/logo.png" alt="" width="135"
                 height="120">
        </div>

        <div class="form-label-group">
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address"
                   value="<?=isset($_POST['email']) ? $_POST['email'] : ''?>" required autofocus>
            <label for="inputEmail">Email</label>
        </div>

<!--        <div class="form-label-group">-->
<!--            <input type="text" name="name" id="inputName" class="form-control" placeholder="Name" required autofocus>-->
<!--            <label for="inputName">Имя</label>-->
<!--        </div>-->

        <div class="form-label-group">
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <label for="inputPassword">Пароль</label>
        </div>

        <?php if (isset($errors) && is_array($errors)) {
            foreach ($errors as $error) {
                ?>
                <div class="alert alert-danger text-center">
                    <a href="#" class="close" data-dismiss="alert">×</a>
                    <?= $error ?>
                </div>
            <?php }
            unset ($errors);
        }
        ?>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Запомнить меня
            </label>
            <a class="pull-right" href="registration">Регистрация</a>
        </div>

        <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Войти"/>
    </form>
</div>