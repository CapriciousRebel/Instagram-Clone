<?php


namespace Model;

use PDO;
use PDOException;


class Post
{
    public static function createPost($path, $caption)
    {
        $username = $_SESSION["username"];
        $database = \DB::get_database();

        if (\Model\User::userExists($username, $username)) {
            $user = \Model\User::getUser($username, $username);
            $user_id = $user['user_id'];
            $query = "INSERT INTO posts(user_id,path,caption) VALUES(?,?,?);";
            $result = $database->prepare($query);
            $result->execute([$user_id, $path, $caption]);
            return true;
        } else {
            return false;
        }
    }

    public static function getPosts()
    {
        $username = $_SESSION["username"];
        $database = \DB::get_database();

        if (\Model\User::userExists($username, $username)) {
            $query = "SELECT account.user_id,username,caption,path,profile_pic FROM posts
            FULL JOIN account ON account.user_id = posts.user_id;";
            $result = $database->prepare($query);
            $result->execute();

            $posts = $result->fetchAll(PDO::FETCH_ASSOC);

            return $posts;
        }
    }
}
