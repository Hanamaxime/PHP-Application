<?php

class Dbclass {
//    private static $dsn = "mysql:host=localhost;dbname=phpclass";
//    private static $username = 'root';
//    private static $password = '';
    private static $dsn = "mysql:host=dazzlin.xyz;dbname=dazzlin";
    private static $username = 'tyzia';
    private static $password = 'mYY.ed8z&8JG37OuOy';

    private static $db;

    private function __construct()
    {
    }

    public static function getDB() {
        // Check if connection is already set, then return this connection
        // otherwise create a connection
        // This ensures, that we have only one connection

        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn, self::$username, self::$password);
            }
            catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        return self::$db;

    }
}