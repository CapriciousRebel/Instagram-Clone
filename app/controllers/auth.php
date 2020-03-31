<?php

namespace Controller;


class Login
{
    public static function post()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = md5($password);
        $user = \Model\User::authenticateUser($username, $password);

        if ($user) {
            $_SESSION["logged-in"] = 1;
            $_SESSION["username"] = $user['username'];
            $_SESSION["user_id"] = $user['user_id'];
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
