<?php

namespace Controller;

class Like
{
    public static function post()
    {
        $user_id = $_SESSION['user_id'];
        $post_id = $_POST['post_id'];

        if (\Model\Post::likePost($user_id,$post_id) == true) {
            echo "liked!";
        } else {
            echo "failed!";
        }
    }
}
