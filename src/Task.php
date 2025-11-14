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

class Task {
    public static function all() {
        $pdo = Database::get();
        $stmt = $pdo->query('SELECT * FROM tasks ORDER BY id DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $pdo = Database::get();
        $stmt = $pdo->prepare('INSERT INTO tasks (title, description) VALUES (?, ?)');
        $stmt->execute([$data['title'], $data['description']]);
        return $pdo->lastInsertId();
    }

    // ... update, delete, find methods ...
}
