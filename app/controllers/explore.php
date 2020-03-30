<?php

namespace Controller;

class Explore
{
    public function get()
    {
        session_start();

        if ($_SESSION["logged-in"] == 1) {
            $user_id = $_SESSION['user_id'];

            $user = \Model\User::getUser($user_id);
            $users = \Model\User::getUsers();

            for ($x = 0; $x < count($users); $x++) {

                $follower_user_id = $users[$x]['user_id'];
                $follow_uniq = strval($user_id) . strval($follower_user_id);
                $follow_uniq_reverse = strval($follower_user_id) . strval($user_id);

                if (\Model\Follow::followerExists($follow_uniq)) {
                    $users[$x]['follows'] = "true";
                } else {
                    $users[$x]['follows'] = "false";
                }

                if (\Model\Follow::followerExists($follow_uniq_reverse)) {
                    $users[$x]['followed'] = "true";
                } else {
                    $users[$x]['followed'] = "false";
                }
            }

            echo \View\Loader::make()->render("templates/explore.twig", array(
                "users" => $users,
                "current_user" => $user,
            ));
        }
    }
}
