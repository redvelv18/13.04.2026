<?php

class DB
{
    public static $pdo = null;
    public static function connect()
    {
        if (self::$pdo === null) {
            $host = '192.168.216.186';
            $db   = 'store_dev_diego';
            $user = 'store_app';
            $pass = 'password';
            $charset = 'utf8mb4';

            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

            try {
                self::$pdo = new PDO($dsn, $user, $pass);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                http_response_code(500);
                die("Savienojuma kļūda: " . $e->getMessage());
            }
        }
    }

    public static function query($sqlQuery)
    {
        if (self::$pdo === null) {
            self::connect();
        }

        try {
            $stmt = self::$pdo->query($sqlQuery);
            return $stmt;
        } catch (PDOException $e) {
            http_response_code(500);
            die("Query kļūda: " . $e->getMessage());
        }
    }
}