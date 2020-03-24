<?php

namespace Controller;

class Login
{

    public static function post()

    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (\Model\User::authenticateUser($username, $password) == true) {

            $_SESSION["logged-in"] = 2;
            $_SESSION["username"] = $username;
    
            echo "verified";

        } else {
            echo "verification failed!";
        }
    }
}
