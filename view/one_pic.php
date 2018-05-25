<div class="container">
    <div class="row">

        <div class="thumbnail  col-sm-6">
            <img class="img-fluid rounded helper"
                 src="../<?= $arr['location'] ?>"
                 alt="london">
            <form class="btn-group d-flex" method="post">

                <input type=submit name="download" class="btn btn-primary w-100" value="Скачать">
                <input type=submit name="delete" class="btn btn-danger w-100" value="Удалить">


<!--                <a href="/pictures/download/--><?//= $arr['id'] ?><!--" class="btn btn-primary w-100" role="button">Скачать-->
<!--                    &raquo;</a>-->
<!--                <a href="/pictures/del/--><?//= $arr['id'] ?><!--" class="btn btn-danger w-100" role="button">Удалить</i></a>-->
            </form>
        </div>

        <ul class="list-group col-sm-6">

            <li class="list-group-item flex-column align-items-start active">
                <h5 class="mb-1"><?= $arr['name_pic'] ?></h5>

            </li>
            <li class="list-group-item flex-column align-items-start ">

                <p class="mb-1"><?= $arr['description'] ?></p>
                <small class="text-muted"><?= date('j M Y', strtotime($arr['created_at'])) .
                    ' in ' . date('H:i', strtotime($arr['created_at'])).' by '.$arr['created_by']  ?>
                </small>
            </li>

        </ul>

    </div>
    <hr>
</div>
