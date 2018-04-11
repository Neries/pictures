<?php


class Users
{
    public static function checkName($name)
    {
        if(strlen($name) >= 2){
            return true;
        }

        return false;
    }

    public static function checkPassword($password)
    {
        if(strlen($password) >= 6){
            return true;
        }
        return false;
    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM users WHERE email = :email';
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

    public static function auth($userData){
        $_SESSION['user_id'] = $userData['id'];
        $_SESSION['user_name'] = $userData['name'];


    }

    public static function checkLogged()
    {
        if (isset($_SESSION['user_id'])){
            return $_SESSION['user_id'];
        }

        header("Location: /login");
    }
}