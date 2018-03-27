<?php

class View
{
//    private $content;
//
//    public  function __construct()
//    {
//        $this->content;
//        $routesPath = ROOT . '/view/master.php';
//        $this->routes = include($routesPath);
//    }

    public function master($arr)
    {
        $content = $this->allPictures(scandir('img/content'));
        return $content;
    }

    public function allPictures($arr)
    {
        $str = '<div class="container"><div class="row">';
        foreach ($arr as $elem) {

            if (is_file($elem)) {
                $str .= '<div class="col-md-3">
                    <h2>Heading</h2>
                    <img class="img-fluid" src="'.$elem.'" alt='.$elem.'>
                    <p><a class="btn btn-secondary" href="#" role="button">Vieasdasdw details &raquo;</a></p>
                </div>';

            }
        }
        $str.= '</div><hr></div>';

        return $str;
    }


}