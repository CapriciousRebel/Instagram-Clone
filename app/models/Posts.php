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

        $query = "SELECT account.user_id,username,caption,path,profile_pic FROM posts
                  FULL JOIN account ON account.user_id = posts.user_id;";
        $result = $database->prepare($query);
        $result->execute();

        $posts = $result->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }
}
