<?php



class Pictures
{

    /** Returns single news items with specified id
     * @rapam integer &id
     */

    public static function getNewsItemByID($id)
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
    public static function getNewsList()
    {
        $db = Db::getConnection();
        $newsList = [];

        $result = $db->query('SELECT * FROM pictures ORDER BY id ASC LIMIT 10');

        $i = 0;
        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['user_id'] = $row['user_id'];
            $newsList[$i]['location'] = $row['location'];
            $i++;
        }

        return $newsList;

    }

}