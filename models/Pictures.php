<?php



class Pictures
{

    /** Returns single news items with specified id
     * @rapam integer &id
     */

    public static function getPicturesItemByID($id)
    {
        $id = intval($id);

        if ($id) {

            $db = Db::getConnection();
            $result = $db->query('SELECT * FROM pictures WHERE id=' . $id);

            $result->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();

            return $newsItem;
        }

    }

    /**
     * Returns an array of news items
     */
    public static function getPicturesList()
    {
        $db = Db::getConnection();
        $picturesList = [];

        $result = $db->query('SELECT * FROM pictures ORDER BY id ASC LIMIT 10');

        $i = 0;
        while ($row = $result->fetch()) {
            $picturesList[$i]['id'] = $row['id'];
            $picturesList[$i]['user_id'] = $row['user_id'];
            $picturesList[$i]['location'] = $row['location'];
            $i++;
        }

        return $picturesList;

    }

}