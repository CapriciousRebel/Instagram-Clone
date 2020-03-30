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
     * returns all the posts
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
        return ($post_count['count']);
    }
}
