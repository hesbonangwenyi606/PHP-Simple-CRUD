<?php
namespace App;

require_once __DIR__ . '/Database.php';

use PDO; // <-- this line ensures we use PHP's PDO class

class Task {

    public static function all() {
        $pdo = Database::get();
        $stmt = $pdo->query('SELECT * FROM tasks ORDER BY id DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $pdo = Database::get();
        $stmt = $pdo->prepare('INSERT INTO tasks (title, description, created_at) VALUES (?, ?, ?)');
        $stmt->execute([$data['title'], $data['description'], date('Y-m-d H:i:s')]);
        return $pdo->lastInsertId();
    }
}
