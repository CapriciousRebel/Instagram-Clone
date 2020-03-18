<?php

require __DIR__ . "/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Home",  
    "/he" => "\testRoute"
));
