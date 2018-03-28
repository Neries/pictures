<?php

class View
{
    public $readyBlock;

    /**
     * Получаем масив и генерируем блоки с картинками
     * получаем строку с данными и сетим её в $readyBlock
     * @param $arrDataFromDb
     */
    public function __construct($arrDataFromDb)
    {
        $this->readyBlock = $this->generateFormPictures($arrDataFromDb);
    }


    public function masterInclude()
    {
        $content = $this->readyBlock;

        $controllerFile = include_once(ROOT . '/view/master.php');
        if (file_exists($controllerFile)) {
            include_once($controllerFile);
        }
    }


    public function generateFormPictures($arr)
    {
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

        return $str;
    }


}