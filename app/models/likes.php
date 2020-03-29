<?php


namespace Model;

use PDO;
use PDOException;


class Like
{

    /**
     * returns true if a like exists for the given user-post
     */
    public static function likeExists($like_uniq)
    {
        $database = \DB::get_database();

        $query = "SELECT * FROM likes WHERE like_uniq = :like_uniq";
        $result = $database->prepare($query);
        $result->execute(
            array(
                ":like_uniq" => $like_uniq,
            )
        );
        $like_exists = $result->fetch(PDO::FETCH_ASSOC);

        if ($like_exists) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * returns the number of likes for the given post_id
     */
    public static function countLikes($post_id)
    {
        $database = \DB::get_database();

        $query = "SELECT COUNT(post_id)
                  FROM likes
                  WHERE post_id = :post_id";

        $result = $database->prepare($query);
        $result->execute(
            array(
                ":post_id" => $post_id,
            )
        );
        $like_count = $result->fetch(PDO::FETCH_ASSOC);
        return ($like_count['count']);
    }

    /**
     * $user_id likes a post with $post_id
     */
    public static function likePost($user_id, $post_id, $like_uniq)
    {
        $database = \DB::get_database();

        if (\Model\Like::likeExists($like_uniq)) {

            $query = "DELETE FROM likes WHERE like_uniq = :like_uniq;";
            $result = $database->prepare($query);
            $result->execute([$like_uniq]);
        } else {
            $query = "INSERT INTO likes(user_id,post_id,like_uniq) VALUES(?,?,?);";
            $result = $database->prepare($query);
            $result->execute([$user_id, $post_id, $like_uniq]);
            return true;
        }
    }
}
