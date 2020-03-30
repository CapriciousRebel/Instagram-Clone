<?php


namespace Model;

use PDO;
use PDOException;

class Follow
{


    /**
     * returns true if a like exists for the given user-post
     */
    public static function followerExists($follow_uniq)
    {
        $database = \DB::get_database();

        $query = "SELECT * FROM followers WHERE follow_uniq = :follow_uniq";
        $result = $database->prepare($query);
        $result->execute(
            array(
                ":follow_uniq" => $follow_uniq,
            )
        );
        $follower_exists = $result->fetch(PDO::FETCH_ASSOC);

        if ($follower_exists) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * returns the followers of $user_id
     */
    public static function getFollowers($user_id)
    {
        $database = \DB::get_database();

        $query = "SELECT * FROM followers WHERE follower = :user_id";
        $result = $database->prepare($query);
        $result->execute(
            array(
                ":user_id" => $user_id,
            )
        );
        $followers = $result->fetchAll(PDO::FETCH_ASSOC);
        return ($followers);
    }


    /**
     * $user_id likes a post with $post_id
     */
    public static function followUser($user_id, $follow_user_id, $follow_uniq)
    {
        $database = \DB::get_database();
        try {
            if (\Model\Follow::followerExists($follow_uniq)) {
                $query = "DELETE FROM followers WHERE follow_uniq = :follow_uniq;";
                $result = $database->prepare($query);
                $result->execute([$follow_uniq]);
                return false;
            } else {
                $query = "INSERT INTO followers(follow,follower,follow_uniq) VALUES(?,?,?);";
                $result = $database->prepare($query);
                $result->execute([$user_id, $follow_user_id, $follow_uniq]);
                return true;
            }
        } catch (PDOException $e) {
            echo "error" . $e;
        }
    }

    /**
     * returns the number of followers of $user_id
     */
    public static function countFollowers($user_id)
    {
        $database = \DB::get_database();

        $query = "SELECT COUNT(user_id)
                  FROM followers
                  WHERE user_id = :user_id";

        $result = $database->prepare($query);
        $result->execute(
            array(
                ":user_id" => $user_id,
            )
        );
        $follow_count = $result->fetch(PDO::FETCH_ASSOC);
        return ($follow_count['count']);
    }
}
