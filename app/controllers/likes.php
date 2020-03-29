<?php

namespace Controller;

class Like
{
    public static function put()
    {
        session_start();

        $_PUT = file_get_contents('php://input');
        $put = explode("&", $_PUT);
        $values = array();
        foreach ($put as $put_argument) {
            array_push($values, explode("=", $put_argument)[1]);
        }

        $user_id = $_SESSION['user_id'];
        $post_id = $values[0];
        $like_uniq = strval($post_id) . strval($user_id);

        if (\Model\Like::likePost($user_id, $post_id, $like_uniq) == true) {
            echo "liked!";
        } else {
            echo "failed!";
        }
    }

}
