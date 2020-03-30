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
            $user = $result->fetch(PDO::FETCH_ASSOC);

            return $user;
        }
    }

    /**
     * returns the user's information O(1)
     */
    public static function getUser($user_id)
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
     * returns all the users
     */
    public static function getUsers()
    {
        $database = \DB::get_database();

        $query = "SELECT * FROM account";
        $result = $database->prepare($query);
        $result->execute();
        $users = $result->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }


    
    /**
     * update the user data O(1)
     */
    public static function updateUser($user_id, $new_username, $new_name, $new_password, $new_email_or_phone)
    {
        $database = \DB::get_database();
        $query = "UPDATE account SET username = :new_username, name = :new_name, password = :new_password, email_or_phone = :new_email_or_phone WHERE user_id = :user_id";
        $result = $database->prepare($query);

        $result->execute(
            array(
                ":user_id" => $user_id,
                ":new_username" => $new_username,
                ":new_name" => $new_name,
                ":new_password" => $new_password,
                ":new_email_or_phone" => $new_email_or_phone
            )
        );
        return true;
    }

    /**
     *  update the user's profile picture O(1)
     */
    public static function updateProfilePic($user_id, $path)
    {

        $database = \DB::get_database();

        $query = "UPDATE account                                                                                                                              
                    SET profile_pic = ?                                                                                                                                                           
                    WHERE user_id = ?;";

        $result = $database->prepare($query);
        $result->execute([$path, $user_id]);
        return true;
    }
}
