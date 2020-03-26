<?php

namespace Controller;

class Login
{

    public static function post()

    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (\Model\User::authenticateUser($username, $password) == true) {
            
            $_SESSION["logged-in"] = 1;

            $user = \Model\User::getUser($username, $username);
            $username = $user['username'];

            $_SESSION["username"] = $username;
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
        $_SESSION["username"] = "";
        $_SESSION["logged-in"] = 0;
        header("Location: /");
    }
}
