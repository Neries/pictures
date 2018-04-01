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

        $result = $db->query('SELECT * FROM pictures ORDER BY created_at DESC LIMIT 25');

//        $picturesList = [];
//        $i = 0;
//        while ($row = $result->fetch()) {
//            $picturesList[$i]['id'] = $row['id'];
//            $picturesList[$i]['user_id'] = $row['user_id'];
//            $picturesList[$i]['location'] = $row['location'];
//            $i++;
//        }

        $picturesList = $result->fetchAll();

        return $picturesList;

    }

    public static function writePictures($uploadfile)
    {

        $db = Db::getConnection();

        $statement = $db->prepare("INSERT INTO pictures(user_id, location, name_pic, description) VALUES(:user_id, :location, :name_pic, :description)");

        $statement->execute([
            "user_id" => $_SESSION['user_id'],
            "location" => $uploadfile,
            "name_pic" => $_POST['name'],
            "description" => $_POST['description'],
        ]);

    }


    public static function deletePictures($id)
    {
        $db = Db::getConnection();
        $db->query("DELETE FROM pictures WHERE id=$id");

    }
}