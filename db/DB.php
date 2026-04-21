<?php

class DB
{
    public static $pdo;

    public static function connect()
    {
        if (!self::$pdo) {
            $config = require __DIR__ . '/config.php';

            $dsn = "mysql:host={$config['db_host']};dbname={$config['db_name']};charset=utf8";
            
            self::$pdo = new PDO(
                $dsn,
                $config['db_user'],
                $config['db_pass']
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


