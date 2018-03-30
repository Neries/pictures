<div class="container"><div class="row">

        <?php foreach ($arr as $elem):
             if (is_file($elem['location'])): ?>

        <div class="col-md-3">
            <div class="thumbnail">
                <h2><?=$elem['name_pic']?></h2>
                <img class="img-fluid img-circle" src="../<?=$elem['location']?>" alt="<?=$elem['location']?>">

                <a href="/pictures/<?=$elem['id']?>" class="btn btn-secondary" role="button">details &raquo;</a>
                <a href="/pictures/del/<?=$elem['id']?>" class="btn btn-danger btn-sm pull-right" role="button">Del</i></a>

            </div>
        </div>


        <?php endif;
        endforeach;?>

</div><hr></div>