<?php

class Home // handles the base route("/")
{
    public function get() // Handles the _GET request, which is always made at the start
    {
        echo \View\Loader::make()->render("templates/home.twig");;
    }
}
