<?php

namespace Controller;

// arranged according to the UX
class SignUp
{
    public function get()
    {
        echo \View\Loader::make()->render("templates/signup.twig");;
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
            $username = $_SESSION["username"];
            $user_id = $_SESSION["user_id"];

            $user = \Model\User::getUser_id($user_id);

            echo \View\Loader::make()->render("templates/profile.twig", array(
                "user" => $user,
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
            $username = $_SESSION["username"];
            $user = \Model\User::getUser($username, $username);
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

        $username = $_SESSION["username"];
        $new_username = $values[0];
        $new_name = $values[1];
        $new_password = $values[2];
        $new_email_or_phone = $values[3];

        if (\Model\User::updateUser($username, $new_username, $new_name, $new_password, $new_email_or_phone) == true) {
            $_SESSION["username"] = $new_username;
            echo "updated!";
        }
    }
}

class UpdateProfile
{

    public function post()
    {
        session_start();

        $filename = $_FILES['file']['name'];
        $caption = $_POST['caption'];

        $location = "assets/uploads/profile_pics/" . $filename;
        $uploadOK = 1;
        $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
        $validExtensions = array("jpg", "jpeg", "png");

        if (!in_array(strtolower($imageFileType), $validExtensions)) {
            $uploadOK = 0;
        }

        if ($uploadOK == 0) {
            echo 0;
        } else {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
                \Model\User::updateProfilePic($location);
                echo $location;
            } else {
                echo 0;
            }
        }
    }
}
