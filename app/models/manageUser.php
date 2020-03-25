<?php


namespace Model;

use PDO;
use PDOException;

class User
{
    /**
     * check if a user already exists
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
        // 
        $database = \DB::get_database();

        if (\Model\User::userExists($username, $email_or_phone)) {
            echo "User already exists!";
        } else {
            $query = "INSERT INTO account(username,password,name,email_or_phone) VALUES(?,?,?,?);";
            $result = $database->prepare($query);
            $result->execute([$username, $password, $name, $email_or_phone]);
            return true;
        }
    }

    /**
     * verify the user's password against their username
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
    public static function getUser($username)
    {
        $database = \DB::get_database();
        $query = "SELECT * FROM account WHERE username = :username";
        $result = $database->prepare($query);
        $result->execute(
            array(
                ":username" => $username,
            )
        );

        $user = $result->fetch(PDO::FETCH_ASSOC);

        return $user;
    }
}
