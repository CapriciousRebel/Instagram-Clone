<?php


namespace Model;

use PDO;
use PDOException;


class Post
{
    /**
     * Create a post by the given user O(1)
     */
    public static function createPost($user_id, $path, $caption)
    {
        $database = \DB::get_database();

        $query = "INSERT INTO posts(user_id,path,caption) VALUES(?,?,?);";
        $result = $database->prepare($query);
        $result->execute([$user_id, $path, $caption]);
        return true;
    }

    /**
     * returns all the data for the posts
     */
    public static function getPosts()
    {
        $database = \DB::get_database();

        $query = "SELECT account.user_id, username, caption, path, profile_pic, posts.post_id
                  FROM account 
                  FULL JOIN posts ON account.user_id = posts.user_id                                                          
                  ORDER BY created_at;";
        $result = $database->prepare($query);
        $result->execute();

        $posts = $result->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }

    /**
     * returns all the data for the posts
     */
    public static function getUserPosts($user_id)
    {
        $database = \DB::get_database();

        $query = "SELECT * FROM posts
                  WHERE user_id = :user_id                 
                  ORDER BY created_at;";
        $result = $database->prepare($query);
        $result->execute(
            array(
                ":user_id" => $user_id,
            )
        );

        $posts = $result->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }

    /**
     * returns the number of posts for the given user_id
     */
    public static function countPosts($user_id)
    {
        $database = \DB::get_database();
        $query = "SELECT COUNT(user_id) 
                  FROM posts                   
                  WHERE user_id = :user_id;";

        $result = $database->prepare($query);
        $result->execute(
            array(
                ":user_id" => $user_id,
            )
        );
        $post_count = $result->fetch(PDO::FETCH_ASSOC);
        return ($post_count);
    }

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
        return ($like_count);
    }

    /**
     * $user_id likes a post with $post_id
     */
    public static function likePost($user_id, $post_id, $like_uniq)
    {
        $database = \DB::get_database();

        if (\Model\Post::likeExists($like_uniq)) {

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
