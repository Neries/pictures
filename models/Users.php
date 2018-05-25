<?php


class Users
{

    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email',$email, PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn()){
            return true;
        }
        return false;
    }


    private static function generateSalt()
    {
        $salt = '';
        $saltLength = 8;
        for ($i = 0; $i < $saltLength; $i++) {
            $salt .= chr(mt_rand(33, 126));
        }
        return $salt;
    }

    public static function registrationUsers($name, $email, $password)
    {
        $db = Db::getConnection();

        $salt = self::generateSalt();
        $saltedPassword = md5($password . $salt);

        $sql = 'INSERT INTO users SET name = :name, email = :email, password = :password, salt = :salt';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $saltedPassword, PDO::PARAM_STR);
        $result->bindParam(':salt', $salt, PDO::PARAM_STR);
        $result->execute();

//        $statement = $db->prepare("INSERT INTO users SET login = '$name', email = '$email',password ='" . $saltedPassword . "', salt = '$salt' ");
//        $statement->execute();

    }

    public static function authorizationUsers($email, $password)
    {
        $db = Db::getConnection();


        $sql = 'SELECT * FROM users WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email',$email, PDO::PARAM_STR);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $user = $result->fetch();


        if ($user) {
            $salt = $user['salt'];
            $saltedPassword = md5($password . $salt);
            if ($user['password'] == $saltedPassword) {
                return $user;
            }
        }

        return false;

    }

}