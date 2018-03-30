<?php
die(var_dump($arr));

$str = '<div class="container"><div class="row">';

foreach ($arr as $elem) {
    if (is_file($elem['location'])) {

        $str .= '<div class="col-md-3">
                    <h2>Heading</h2>
                    <img class="img-fluid" src="../'.$elem['location'].'" alt='.$elem['location'].'>
                    <p><a class="btn btn-secondary" href="/pictures/'.$elem['id'].'" role="button">details &raquo;</a></p>
                </div>';

    }

}

$str.= '</div><hr></div>';