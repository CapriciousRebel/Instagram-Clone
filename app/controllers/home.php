<?php

namespace Controller;

class Home
{
    public function get()
    {
        session_start();

        if ($_SESSION["logged-in"] == 1) {

            $posts = \Model\Post::getPosts();
            shuffle($posts);

            echo \View\Loader::make()->render("templates/homepage.twig", array(
                "posts" => $posts
            ));
        } else {
            echo \View\Loader::make()->render("templates/home.twig");
        }
    }
}
