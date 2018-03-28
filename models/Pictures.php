<?php


class Pictures
{

    /** Returns single pictures items with specified id
     * @param integer $id
     * @return array
     */


    public static function getPicturesItemByID(int $id)
    {
        $id = intval($id);

        if ($id) {

            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM pictures WHERE id=' . $id);

            $result->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetchAll();

            return $newsItem;
        }

    }

    /**
     * Returns an array of pictures items
     */
    public static function getPicturesList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM pictures ORDER BY id ASC LIMIT 10');

//        $picturesList = [];
//        $i = 0;
//        while ($row = $result->fetch()) {
//            $picturesList[$i]['id'] = $row['id'];
//            $picturesList[$i]['user_id'] = $row['user_id'];
//            $picturesList[$i]['location'] = $row['location'];
//            $i++;
//        }

        $picturesList = $result->fetchAll();

//        die(var_dump($picturesList));

        return $picturesList;

    }

    public static function writePictures()
    {
        $message = "Error";
        $db = Db::getConnection();
        $uploaddir = 'img/content/';
        $uploadfile = $uploaddir."$_SESSION[user_id]_".time().'_'.basename($_FILES['uploadfile']['name']);

        if (copy($_FILES['uploadfile']['tmp_name'], $uploadfile))
        {
            $statement = $db->prepare("INSERT INTO pictures(user_id, location) VALUES(:user_id, :location)");
            $statement->execute([
                "user_id" => $_SESSION['user_id'],
                "location" => $uploadfile,
            ]);

            $message = 'Файл сохранен';
        }

        return $message;


//        else { echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; exit; }
    }

}