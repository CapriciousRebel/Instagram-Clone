<?php

namespace Controller;

class Login
{

    public static function post()
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if (\Model\User::authenticateUser($username, $password)) {

            $_SESSION["logged-in"] = true;
            $_SESSION["username"] = $username;
            // echo " authenticated!";
            // echo $_SESSION["username"];
            // header("location: /");
        } else {
            $_SESSION["login-failed"] = true;
            //header("location: /");
            //echo "Invalid username or password!";
        }
    }
}
