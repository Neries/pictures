<div class="container">
    <div class="row">

        <?php foreach ($arr as $elem):
            if (is_file($elem['location'])): ?>

                <div class="parent rounded" onclick="">
                    <div class="child images-text" style="background-image: url('../<?= $elem['location'] ?>');">
                        <a href="/pictures/<?= $elem['id'] ?>"><?= $elem['name_pic'] ?></a>
                    </div>
                </div>


            <?php endif;
        endforeach; ?>

    </div>
    <hr>
</div>


