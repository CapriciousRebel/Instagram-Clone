<?php

namespace Controller;


class Upload
{
    public function get()
    {
        session_start();

        if ($_SESSION["logged-in"] == 1) {
            $username = $_SESSION["username"];
            $user = \Model\User::getUser($username, $username);
            echo \View\Loader::make()->render("templates/upload.twig", array(
                "user" => $user,
            ));
        } else {
            echo \View\Loader::make()->render("templates/home.twig");
        }
    }

    public function post()
    {
        session_start();

        $filename = $_FILES['file']['name'];
        $caption = $_POST['caption'];

        $location = "assets/uploads/" . $filename;
        $uploadOK = 1;
        $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
        $validExtensions = array("jpg", "jpeg", "png");

        if (!in_array(strtolower($imageFileType), $validExtensions)) {
            $uploadOK = 0;
        }

        if ($uploadOK == 0) {
            echo 0;
        }else{
            if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
                \Model\Post::createPost($location,$caption);
                echo $location;
            }else{
                echo 0;
            }
        }
    }
}
