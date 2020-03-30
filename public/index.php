<?php

session_start();

// $_SESSION["logged-in"] = 0; <--- This was the problem, everytime I loaded the index page, 
// this variable was getting set to 0, and hence login was not getting authenticated

require __DIR__ . "/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Controller\Home",
    "/test" => "\Controller\Test",
    "/signup" => "\Controller\SignUp",
    "/login" => "\Controller\Login",
    "/logout" => "\Controller\Logout",
    "/profile" => "\Controller\Userpage",
    "/edit" => "\Controller\Edit",
    "/update" => "\Controller\Update",
    "/upload" => "\Controller\Upload",
    "/like" => "\Controller\Like",
    "/comment" => "\Controller\Comment",
    "/upload_profile" => "\Controller\UpdateProfilePic",
    "/user" => "\Controller\User",
    "/explore" => "\Controller\Explore",

));
