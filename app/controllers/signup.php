<?php

namespace Controller;

class SignUp // handles the base route("/")
{
    public function get() // Handles the _GET request, which is always made at the start, to get the page.
    {
        echo \View\Loader::make()->render("templates/signup.twig");;
    }

    public function post() // Handles the _POST request, made when the signup form is submitted.
    {
        $name = $_POST["name"];
        $email_or_phone = $_POST["email-phone"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        if(\Model\User::createUser($username,$password,$name,$email_or_phone)){
            header("Location: /");
        };
    }
}
