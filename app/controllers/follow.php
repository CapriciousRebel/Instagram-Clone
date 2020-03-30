<?php

namespace Controller;

class Follow
{
    public function put()
    {

        session_start();

        $_PUT = file_get_contents('php://input');
        $put = explode("&", $_PUT);
        $values = array();
        foreach ($put as $put_argument) {
            array_push($values, explode("=", $put_argument)[1]);
        }

        $user_id = $_SESSION['user_id'];
        $follow_user_id = $values[0];
        $follow_uniq = strval($follow_user_id) . strval($user_id);

        if (\Model\Follow::followUser($user_id, $follow_user_id, $follow_uniq) == true) {
            echo "followed!";
        } else {
            echo "unfollowed!";
        }
    }
}
