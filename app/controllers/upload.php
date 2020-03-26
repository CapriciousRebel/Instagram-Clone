<?php

namespace Controller;


class Upload
{
    public function get()
    {
        session_start();

        if ($_SESSION["logged-in"] == 1) {
            $username = $_SESSION["username"];
            $user = \Model\User::getUser($username,$username);
            echo \View\Loader::make()->render("templates/upload.twig", array(
                "user" => $user,
            ));
        } else {
            echo \View\Loader::make()->render("templates/home.twig");
        }
    }
}
