<?php

session_start();

$_SESSION["logged-in"]=false;
$_SESSION["login-failed"]=false;

require __DIR__ . "/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Controller\Home",
    "/signup" => "\Controller\SignUp",
    "/login" => "\Controller\Login",
    "/login-form" => "\Controller\LoginForm"
));
