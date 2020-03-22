<?php

class DB
{
    private static $database;

    public static function get_database()
    {
        // include __DIR__ . "/../../config/config.php";

        if (!self::$database) {

            $username = 'postgres';
            $password = 'Hl0olqwv';
            $host = 'localhost';
            $dbname = 'instagram';

            self::$database = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

            self::$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$database;
    }
}
