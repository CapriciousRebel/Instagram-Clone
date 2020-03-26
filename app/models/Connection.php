<?php

class DB
{
    private static $database;

    /**
     * returns the instance of the database
     */
    public static function get_database()
    {
        include __DIR__ . "/../../config/config.php";

        if (!self::$database) {

            self::$database = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

            self::$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$database;
    }
}
