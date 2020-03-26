<?php

session_start();

// $_SESSION["logged-in"] = 0; <--- This was the problem, everytime I loaded the index page, 
// this variable was getting set to 0, and hence login was not getting authenticated

require __DIR__ . "/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Controller\Home",
    "/signup" => "\Controller\SignUp",
    "/login" => "\Controller\Login",
    "/update" => "\Controller\Update",
    "/user" => "\Controller\User",
    "/edit" => "\Controller\Edit"
));
