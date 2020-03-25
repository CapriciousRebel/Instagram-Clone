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
