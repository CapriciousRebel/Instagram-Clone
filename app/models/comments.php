<?php


namespace Model;

use PDO;
use PDOException;


class Comment
{

    /**
     * returns true if a like exists for the given user-post
     */
    public static function commentExists($comment_uniq)
    {
        $database = \DB::get_database();

        $query = "SELECT * FROM comments WHERE comment_uniq = :comment_uniq";
        $result = $database->prepare($query);
        $result->execute(
            array(
                ":comment_uniq" => $comment_uniq,
            )
        );
        $comment_exists = $result->fetch(PDO::FETCH_ASSOC);

        if ($comment_exists) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * returns the number of comments for the given post_id
     */
    public static function countComments($post_id)
    {
        $database = \DB::get_database();

        $query = "SELECT COUNT(post_id)
                  FROM comments
                  WHERE post_id = :post_id";

        $result = $database->prepare($query);
        $result->execute(
            array(
                ":post_id" => $post_id,
            )
        );
        $comment_count = $result->fetch(PDO::FETCH_ASSOC);

        return ($comment_count['count']);
    }

    /**
     * $user_id comments a post with $post_id
     */
    public static function addComment($user_id, $post_id, $comment_uniq, $comment)
    {
        $database = \DB::get_database();
        try{
        $query = "INSERT INTO comments(user_id,post_id,comment_uniq,comment) VALUES(?,?,?,?);";
        $result = $database->prepare($query);
        $result->execute([$user_id, $post_id, $comment_uniq,$comment]);
        return true;}
        catch(PDOException $e) {
            echo "error" . $e;
        }
    }
}
