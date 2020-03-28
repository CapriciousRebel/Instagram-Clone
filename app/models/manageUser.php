<?php


namespace Model;

use PDO;
use PDOException;

class User
{
    /**
     * returns true if a user with given username or email_or_phone already exists
     */
    public static function userExists($username, $email_or_phone)
    {
        $database = \DB::get_database();

        try {

            $query = "SELECT * FROM account WHERE username = :username";
            $result = $database->prepare($query);
            $result->execute(
                array(
                    ":username" => $username,
                )
            );
            $username_exists = $result->fetch(PDO::FETCH_ASSOC);

            $query = "SELECT * FROM account WHERE email_or_phone = :email_or_phone;";
            $result = $database->prepare($query);
            $result->execute(
                array(
                    ":email_or_phone" => $email_or_phone,
                )
            );
            $email_or_phone_exits = $result->fetch(PDO::FETCH_ASSOC);

            if ($username_exists || $email_or_phone_exits) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "error" . $e;
        }
    }

    /**
     * create a new user
     */
    public static function createUser($username, $password, $name, $email_or_phone)
    {
        $database = \DB::get_database();
        $password = md5($password);

        if (\Model\User::userExists($username, $email_or_phone)) {
            echo "User already exists!";
            // implement js here
        } else {
            $query = "INSERT INTO account(username,password,name,email_or_phone) VALUES(?,?,?,?);";
            $result = $database->prepare($query);
            $result->execute([$username, $password, $name, $email_or_phone]);
            return true;
        }
    }

    /**
     * verify the user's password against their username and password
     */
    public static function authenticateUser($username, $password)
    {

        $database = \DB::get_database();

        if (\Model\User::userExists($username, $username)) {
            $query = "SELECT * FROM account WHERE password = :password";
            $result = $database->prepare($query);
            $result->execute(
                array(
                    ":password" => $password,
                )
            );
            $password_verified = $result->fetch(PDO::FETCH_ASSOC);

            if ($password_verified) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * returns the user's information
     */
    public static function getUser($username, $email_or_phone)
    {
        $database = \DB::get_database();
        $query = "SELECT * FROM account WHERE username = :username OR email_or_phone = :email_or_phone";
        $result = $database->prepare($query);
        $result->execute(
            array(
                ":username" => $username,
                ":email_or_phone" => $email_or_phone
            )
        );

        $user = $result->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    public static function getUser_id($user_id)
    {
        $database = \DB::get_database();

        $query = "SELECT * FROM account WHERE user_id = :user_id";
        $result = $database->prepare($query);
        $result->execute(
            array(
                ":user_id" => $user_id,
            )
        );

        $user = $result->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    /**
     * update the user data
     */
    public static function updateUser($username, $new_username, $new_name, $new_password, $new_email_or_phone)
    {
        $database = \DB::get_database();
        $query = "UPDATE account SET username = :new_username, name = :new_name, password = :new_password, email_or_phone = :new_email_or_phone WHERE username = :username";
        $result = $database->prepare($query);

        $result->execute(
            array(
                ":username" => $username,
                ":new_username" => $new_username,
                ":new_name" => $new_name,
                ":new_password" => $new_password,
                ":new_email_or_phone" => $new_email_or_phone
            )
        );

        return true;
    }

    public static function updateProfilePic($path)
    {
        $username = $_SESSION["username"];

        $database = \DB::get_database();

        if (\Model\User::userExists($username, $username)) {
            $user = \Model\User::getUser($username, $username);
            $user_id = $user['user_id'];
            $query = "UPDATE account                                                                                                                              
                    SET profile_pic = ?                                                                                                                                                           
                    WHERE user_id = ?;";

            $result = $database->prepare($query);
            $result->execute([$path, $user_id]);
            return true;
        } else {
            return false;
        }
    }

    public static function getProfilePic()
    {
        $username = $_SESSION["username"];
        $database = \DB::get_database();

        if (\Model\User::userExists($username, $username)) {
            $query = "SELECT account.user_id,username,caption,path FROM posts
            FULL JOIN account ON account.user_id = posts.user_id;";
            $result = $database->prepare($query);
            $result->execute();

            $posts = $result->fetchAll(PDO::FETCH_ASSOC);

            return $posts;
        }
    }
}
