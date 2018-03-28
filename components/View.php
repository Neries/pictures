<?php

class View
{
    public $readyBlock;
    public $message;

    /**
     * Получаем масив и генерируем блоки с картинками
     * получаем строку с данными и сетим её в $readyBlock
     * @param $arrDataFromDb
     */
//    public function __construct($arrDataFromDb)
//    {
//        $this->readyBlock = $this->generateFormPictures($arrDataFromDb);
//    }

    public function setMessage($str)
    {
        $this->message = $str;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setReadyBlock($str)
    {
        $this->readyBlock = $str;
    }

    public function getReadyBlock()
    {
        return $this->readyBlock;
    }

    public function masterInclude()
    {
        $content = $this->getReadyBlock();
        $message = $this->getMessage();

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

        $this->setReadyBlock($str);
    }

    public function generateFormAdd()
    {
        $str = '<div class="container" style="padding-top: 65px">
            
                <form action="add/uploadfile" method="post" enctype=multipart/form-data>
            
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
            </div>';

        $this->setReadyBlock($str);
    }


}