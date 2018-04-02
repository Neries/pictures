<div class="container">
    <div class="row">

        <div class="thumbnail  col-sm-6">
            <img class="img-fluid rounded helper"
                 src="../<?= $arr[0]['location'] ?>"
                 alt="london">
            <div class="btn-group d-flex">
                <a href="/pictures/download/<?= $arr[0]['id'] ?>" class="btn btn-primary w-100" role="button">Скачать
                    &raquo;</a>
                <a href="/pictures/del/<?= $arr[0]['id'] ?>" class="btn btn-danger w-100" role="button">Удалить</i></a>
            </div>
        </div>

        <ul class="list-group col-sm-6">

            <li class="list-group-item flex-column align-items-start active">
                <h5 class="mb-1"><?= $arr[0]['name_pic'] ?></h5>

            </li>
            <li class="list-group-item flex-column align-items-start ">

                <p class="mb-1"><?= $arr[0]['description'] ?></p>
                <small class="text-muted"><?= date('j M Y  H:i', strtotime($arr[0]['created_at'])) . ' in ' . date('H:i', strtotime($arr[0]['created_at'])) ?>
                    by NEED ADD
                </small>
            </li>

        </ul>

    </div>
    <hr>
</div>
