<?php

class Home //this is my controller for base route("/")
{
    public function get() //when browser makes a _GET request, this function will be called
    {
        echo "Hello !";
    }
}
