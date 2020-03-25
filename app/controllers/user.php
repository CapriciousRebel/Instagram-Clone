<?php

namespace Controller;

class User
{
    public function get()
    {
        session_start();

        if ($_SESSION["logged-in"] == 2) {
            echo \View\Loader::make()->render("templates/userpage.twig",array(
                "username" => $_SESSION["username"],
            ));
        } else {
            echo \View\Loader::make()->render("templates/home.twig");
        }
    }
}
