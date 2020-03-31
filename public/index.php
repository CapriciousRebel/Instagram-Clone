<?php

session_start();

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
    "/top" => "\Controller\Top",
    "/latest" => "\Controller\Latest",
    "/trending" => "\Controller\Trending",
    "/follow" => "\Controller\Follow",
));
