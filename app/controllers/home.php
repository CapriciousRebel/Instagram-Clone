<?php

namespace Controller;

class Home
{
    public function get()
    {
        session_start();

        if ($_SESSION["logged-in"] == 1) {
            echo \View\Loader::make()->render("templates/homepage.twig");

        } else {
            echo \View\Loader::make()->render("templates/home.twig");
        }
    }
}
    