<link href="/css/authform.css" rel="stylesheet">
<div class="form-test">
    <form class="form-signin" method="POST" action="account" >

        <h3><?='Привет '.$_SESSION['user_name'].'.<br> Дата регистрации: '.$_SESSION['user_created_at']?></h3>
        <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="выйти"/>

    </form>
</div>

