<?php

namespace Controller;


class Login
{
    public static function post()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = md5($password);

        if (\Model\User::authenticateUser($username, $password) == true) {
            $user = \Model\User::getUser($username, $username);
            $username = $user['username'];
            $user_id = $user['user_id'];

            $_SESSION["logged-in"] = 1;
            $_SESSION["username"] = $username;
            $_SESSION["user_id"] = $user_id;

            echo "verified";
        } else {
            echo "verification failed!";
        }
    }
}

class Logout
{

    public static function get()

    {
        $_SESSION["logged-in"] = 0;
        $_SESSION["username"] = "";
        $_SESSION["user_id"] = 0;
        
        header("Location: /");
    }
}
