<?php

namespace Controller;


class SignUp
{
    public function get()
    {
        echo \View\Loader::make()->render("templates/signup.twig");
    }

    public function post()
    {
        $name            = $_POST["name"];
        $email_or_phone  = $_POST["email-phone"];
        $username        = $_POST["username"];
        $password        = $_POST["password"];

        if (\Model\User::createUser($username, $password, $name, $email_or_phone)) {
            // after sign-up, user MUST login again
            $_SESSION['logged-in'] = 0;
            $_SESSION['user_id'] = 0;

            header("Location: /");
        };
    }
}


class Userpage
{
    public function get()
    {
        session_start();

        if ($_SESSION["logged-in"] == 1) {

            $user_id = $_SESSION["user_id"];
            $user = \Model\User::getUser($user_id);
            $post_count = \Model\Post::countPosts($user_id);
            $posts = \Model\Post::getUserPosts($user_id);
            $follower_count = \Model\Follow::countFollowers($user_id);
            $following_count = \Model\Follow::countFollowing($user_id);

            echo \View\Loader::make()->render("templates/profile.twig", array(
                "user" => $user,
                "post_count" => $post_count,
                "follower_count" => $follower_count,
                "following_count" => $following_count,
                "posts" => $posts,
            ));
        } else {
            echo \View\Loader::make()->render("templates/home.twig");
        }
    }
}



class Edit
{
    public function get()
    {
        session_start();

        if ($_SESSION["logged-in"] == 1) {

            $user_id = $_SESSION["user_id"];
            $user = \Model\User::getUser($user_id);

            echo \View\Loader::make()->render("templates/edit.twig", array(
                "user" => $user,
            ));
        } else {
            echo \View\Loader::make()->render("templates/home.twig");
        }
    }
}


class Update
{
    public function put()
    {
        session_start();

        $_PUT = file_get_contents('php://input');
        $put = explode("&", $_PUT);

        $values = array();
        foreach ($put as $put_argument) {
            array_push($values, explode("=", $put_argument)[1]);
        }

        $user_id = $_SESSION["user_id"];
        $new_username = $values[0];
        $new_name = $values[1];
        $new_password = $values[2];
        $new_email_or_phone = $values[3];

        if (\Model\User::updateUser($user_id, $new_username, $new_name, $new_password, $new_email_or_phone) == true) {
            $_SESSION["username"] = $new_username;
            echo "updated!";
        }
    }
}

class UpdateProfilePic
{

    public function post()
    {
        session_start();

        $user_id = $_SESSION["user_id"];

        $filename = $_FILES['file']['name'];
        $caption = $_POST['caption'];

        $path = "assets/uploads/profile_pics/" . $filename;
        $uploadOK = 1;
        $imageFileType = pathinfo($path, PATHINFO_EXTENSION);
        $validExtensions = array("jpg", "jpeg", "png");

        if (!in_array(strtolower($imageFileType), $validExtensions)) {
            $uploadOK = 0;
        }

        if ($uploadOK == 0) {
            echo 0;
        } else {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
                \Model\User::updateProfilePic($user_id, $path);
                echo $path;
            } else {
                echo 0;
            }
        }
    }
}

class User
{
    public function get()
    {
        $user_id = $_GET['user_id'];
        $user = \Model\User::getUser($user_id);
        
        echo \View\Loader::make()->render(
            "templates/user.twig",
            array(
                "user" => $user,   
            )
        );
    }
}
