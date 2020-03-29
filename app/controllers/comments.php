<?php

namespace Controller;

class Comment
{

    public function post()
    {
        session_start();
        $user_id = $_SESSION['user_id'];
        $comment = $_POST['comment'];
        $post_id = $_POST['post_id'];

        $comment_uniq = strval($post_id) . strval($user_id);

        //echo \Model\Comment::addComment($user_id, $post_id, $comment_uniq, $comment);

        if (\Model\Comment::addComment($user_id, $post_id, $comment_uniq, $comment) == true) {
            echo "commented";
        } else {
            echo "failed!";
        }
    }
}
