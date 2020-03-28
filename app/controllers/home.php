<?php

namespace Controller;

class Home
{
    public function get()
    {
        session_start();

        if ($_SESSION["logged-in"] == 1) {

            $user_id = $_SESSION['user_id'];
            $user = \Model\User::getUser($user_id);

            $posts = \Model\Post::getPosts();

            echo \View\Loader::make()->render("templates/homepage.twig", array(
                "posts" => $posts,
                "user" => $user
            ));
        } else {
            echo \View\Loader::make()->render("templates/home.twig");
        }
    }
}
