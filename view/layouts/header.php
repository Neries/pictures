<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pictures</title>
    <link href="/css/bootstrap.css" rel="stylesheet">
    <script src="/css/jquery-3.3.1.js"></script>
    <script src="/css/myJs.js"></script>
    <script src="/css/popper.min.js"></script>
    <script src="/css/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="/css/custom.css" rel="stylesheet">


    <style>

    </style>

</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="/">Pictures</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
            <a href="/pictures/add" class="form-control mr-sm-2 btn btn-success btn-lg active" role="button"
            aria-pressed="true">Добавить</a>

            <a href="<?=isset($_SESSION['auth']) ? 'account' : 'login' ?>" class="form-control mr-sm-2 btn btn-primary btn-lg active" role="button"
               aria-pressed="true"><?=isset($_SESSION['auth']) ? $_SESSION['user_name'] : 'Войти' ?></a>
<!--TODO: ПЕРЕДЕЛАТЬ ПОИСК-->
            <input id="search" class="form-control mr-sm-2" type="text" placeholder="Имя картинки" aria-label="Search">
            <ul class="search_result"></ul>

            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>

        </div>
    </div>
</nav>


<main role="main" style="padding-top: 70px;">
    <?php if (isset($_SESSION['message'])){
        ?>
        <div class="<?=session('type_message')?> text-center">
            <a href="#" class="close" data-dismiss="alert">×</a>
            <?=session('message') ?>
        </div>
        <?php unset ($_SESSION['message'], $_SESSION['type_message']);
    }
    ?>

</main>


