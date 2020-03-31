<?php

namespace Controller;


class Top
{
    public function get()
    {
        session_start();

        if ($_SESSION["logged-in"] == 1) {

            $user_id = $_SESSION['user_id'];
            $user = \Model\User::getUser($user_id);
            $posts = \Model\Post::getPosts();
            $posts = array_reverse($posts);

            for ($x = 0; $x < count($posts); $x++) {

                $post_id = $posts[$x]['post_id'];
                $like_uniq = strval($post_id) . strval($user_id);

                $posts[$x]["likes"] = \Model\Like::countLikes($post_id);
                $posts[$x]["comments"] = \Model\Comment::getComments($post_id);

                if (\Model\Like::likeExists($like_uniq)) {
                    $posts[$x]["liked"] = "true";
                } else {
                    $posts[$x]["liked"] = "false";
                }
            }

            // using bubble sort to sort according to number of likes
            $n = sizeof($posts);
            for ($i = 0; $i < $n; $i++) {
                for ($j = 0; $j < $n - $i - 1; $j++) {
                    if ($posts[$j]['likes'] < $posts[$j + 1]['likes']) {
                        $t = $posts[$j];
                        $posts[$j] = $posts[$j + 1];
                        $posts[$j + 1]  = $t;
                    }
                }
            }

            echo \View\Loader::make()->render("templates/homepage.twig", array(
                "posts" => $posts,
                "user" => $user,
            ));
        } else {
            echo \View\Loader::make()->render("templates/home.twig");
        }
    }
}
