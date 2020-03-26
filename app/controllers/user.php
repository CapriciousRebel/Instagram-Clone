<?php

namespace Controller;

class User
{
    public function get()
    {
        session_start();

        if ($_SESSION["logged-in"] == 2) {
            $username = $_SESSION["username"];
            $user = \Model\User::getUser($username);

            echo \View\Loader::make()->render("templates/user_profile.twig", array(
                "user" => $user,
            ));
        } else {
            echo \View\Loader::make()->render("templates/home.twig");
        }
    }
}

class Edit
{
    public function get()
    {
        session_start();

        if ($_SESSION["logged-in"] == 2) {
            $username = $_SESSION["username"];
            $user = \Model\User::getUser($username);

            echo \View\Loader::make()->render("templates/edit_profile.twig", array(
                "user" => $user,
            ));
        } else {
            echo \View\Loader::make()->render("templates/home.twig");
        }
    }
}


class Update
{
    public function put()
    {
        session_start();

        $_PUT = file_get_contents('php://input');
        $put = explode("&", $_PUT);

        $values = array();

        foreach ($put as $put_argument) {
            array_push($values, explode("=", $put_argument)[1]);
        }

        $username = $_SESSION["username"];

        $new_username = $values[0];
        $new_name = $values[1];
        $new_password = $values[2];
        $new_email_or_phone = $values[3];


        echo \Model\User::updateUser($username, $new_username, $new_name, $new_password, $new_email_or_phone);

        if (\Model\User::updateUser($username, $new_username, $new_name, $new_password, $new_email_or_phone) == true) {
            $_SESSION["username"] = $new_username;
            echo "succ";
        }
    }
}
