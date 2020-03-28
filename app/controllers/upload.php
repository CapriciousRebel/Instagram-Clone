<?php

namespace Controller;


class Upload
{
    public function get()
    {
        session_start();

        if ($_SESSION["logged-in"] == 1) {
            echo \View\Loader::make()->render("templates/upload.twig");
        } else {
            echo \View\Loader::make()->render("templates/home.twig");
        }
    }

    public function post()
    {
        session_start();

        $user_id = $_SESSION['user_id'];
        $filename = $_FILES['file']['name'];
        $caption = $_POST['caption'];

        $path = "assets/uploads/posts/" . $filename;
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
                \Model\Post::createPost($user_id, $path, $caption);
                echo $path;
            } else {
                echo 0;
            }
        }
    }
}
