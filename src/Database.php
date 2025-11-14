<?php
namespace App;

use PDO;

class Database {
    private static $pdo;

    public static function get(): PDO {
        if (!self::$pdo) {
            $path = __DIR__ . '/../data/database.sqlite';
            self::$pdo = new PDO('sqlite:' . $path);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$pdo;
    }
}
