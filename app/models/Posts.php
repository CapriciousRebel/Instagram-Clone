<?php


namespace Model;

use PDO;
use PDOException;


class Post
{
    public static function createPost($path,$caption)
    {
        $username = $_SESSION["username"];
        $database = \DB::get_database();
        
        if (\Model\User::userExists($username, $username)) {

            $query = "INSERT INTO posts(username,path,caption) VALUES(?,?,?);";
            $result = $database->prepare($query);
            $result->execute([$username, $path, $caption]);
            return true;
        }else{
            return false;
        }
    }
}
