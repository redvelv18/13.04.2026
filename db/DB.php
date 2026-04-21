<?php

class DB
{
    public static $mysqli;

    public static function connect()
    {
        if (!self::$mysqli) {
            self::$mysqli = new mysqli(
                "192.168.208.1",
                "store_app",
                "password",
                "store_dev_diegosterling"
            );

            if (self::$mysqli->connect_error) {
                throw new Exception("Connection failed: " . self::$mysqli->connect_error);
            }

            self::$mysqli->set_charset("utf8");
        }
    }

    public static function query($sqlQuery)
    {
        if (self::$mysqli === null) {
            self::connect();
        }

        $result = self::$mysqli->query($sqlQuery);

        if ($result === false) {
            throw new Exception("Query failed: " . self::$mysqli->error);
        }

        return $result;
    }
}


