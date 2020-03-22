<?php

session_start();
require __DIR__ . "/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Home",
    "/signup" => "\SignUp"
));
