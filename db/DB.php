<?php

class DB
{
    public static $pdo;

    public static function connect()
    {
        if (!self::$pdo) {
            self::$pdo = new PDO(
                "mysql:host=192.168.208.1;dbname=store_dev_diegosterling;charset=utf8",
                "store_app",
                "password"
            );

            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    public static function query($sqlQuery)
    {
        if (self::$pdo === null) {
            self::connect();
        }

        $stmt = self::$pdo->query($sqlQuery);
        return $stmt;
    }
}


