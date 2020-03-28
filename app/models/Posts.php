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

        $query = "SELECT account.user_id,username,caption,path,profile_pic,created_at 
                  FROM posts
                  FULL JOIN account ON account.user_id = posts.user_id
                  ORDER BY created_at DESC;";

        $query = "SELECT account.user_id,username,caption,path,profile_pic,created_at,likes.post_id ,posts.post_id
                  FROM account 
                  FULL JOIN posts ON account.user_id = posts.user_id 
                  FULL JOIN likes ON likes.post_id = posts.post_id                                                           
                  ORDER BY created_at;";
        $result = $database->prepare($query);
        $result->execute();

        $posts = $result->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }

    /**
     * $user_id likes a post with $post_id
     */
    public static function likePost($user_id, $post_id)
    {
        $database = \DB::get_database();

        $query = "INSERT INTO likes(user_id,post_id) VALUES(?,?);";
        $result = $database->prepare($query);
        $result->execute([$user_id,$post_id]);
        return true;
    }
}
