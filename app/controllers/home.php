<?php

namespace Controller;

class Home
{
    public function get()
    {
        session_start();

        if ($_SESSION["logged-in"] == 2) {
            echo $_SESSION["username"];
            echo \View\Loader::make()->render("templates/homepage.twig");

        } else {
            echo \View\Loader::make()->render("templates/home.twig");
        }
    }
}
