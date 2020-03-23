<?php

namespace Controller;

class Home
{
    public function get()
    {
        if ($_SESSION["logged-in"]) {
            echo \View\Loader::make()->render("templates/homepage.twig");
        } else {
            echo \View\Loader::make()->render("templates/home.twig");
        }
    }
}
