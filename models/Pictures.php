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

}