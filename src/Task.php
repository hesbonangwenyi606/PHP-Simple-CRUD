<?php
namespace App;

require_once __DIR__ . '/Database.php';

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

    // Optional: add update, delete, find here...
}
