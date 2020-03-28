<?php

namespace Controller;

class Home
{
    public function get()
    {
        session_start();

        if ($_SESSION["logged-in"] == 1) {

            $user_id = $_SESSION['user_id'];
            $user = \Model\User::getUser_id($user_id);

            $posts = \Model\Post::getPosts();
            shuffle($posts);

            echo \View\Loader::make()->render("templates/homepage.twig", array(
                "posts" => $posts,
                "user" => $user
            ));
        } else {
            echo \View\Loader::make()->render("templates/home.twig");
        }
    }
}
