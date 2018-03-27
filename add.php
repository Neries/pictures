<?php session_start();
$_SESSION['user_id'] = 12;?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pictures</title>
    <link href="/css/bootstrap.css" rel="stylesheet">
    <script src="/css/jquery-3.2.1.slim.min.js"></script>
    <script src="/css/popper.min.js"></script>
    <script src="css/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="/">Pictures</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <!--            <li class="nav-item">-->
            <!--                <a class="nav-link" href="#">Link</a>-->
            <!--            </li>-->
            <!--            <li class="nav-item">-->
            <!--                <a class="nav-link disabled" href="#">Disabled</a>-->
            <!--            </li>-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <a href="/add.php" class="form-control mr-sm-2 btn btn-primary btn-lg active" role="button" aria-pressed="true">Add</a>
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>



<div class="container" style="padding-top: 65px">

    <form action=upload.php method=post enctype=multipart/form-data>

        <div class="form-group">
            <label for="exampleTextarea">Example textarea</label>
            <textarea class="form-control" id="exampleTextarea" rows="1"></textarea>
        </div>


        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" name=uploadfile class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">*.png *.jpg</small>
        </div>

        <input type=submit class="btn btn-primary" value=Загрузить>
    </form>
</div>




<footer class="container">
    <p>&copy; Company 2017-2018</p>
</footer>


</body>
</html>