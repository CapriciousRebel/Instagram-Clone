<?php

namespace Controller;

class Explore
{
    public function get()
    {
        $user_id = $_SESSION['user_id'];
        $users = \Model\User::getUsers();

        echo \View\Loader::make()->render("templates/explore.twig", array(
            "users" => $users,
        ));
    }
}
