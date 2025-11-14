<?php
namespace App;
use App\Database;

class Task {
    public static function all() {
        $pdo = Database::get();
        $stmt = $pdo->query('SELECT * FROM tasks ORDER BY id DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function find($id) {
        $pdo = Database::get();
        $stmt = $pdo->prepare('SELECT * FROM tasks WHERE id = ?');
        $stmt->execute([(int)$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function create($data) {
        $pdo = Database::get();
        $stmt = $pdo->prepare('INSERT INTO tasks (title, description) VALUES (?, ?)');
        $stmt->execute([$data['title'], $data['description']]);
        return $pdo->lastInsertId();
    }
    public static function update($id, $data) {
        $pdo = Database::get();
        $stmt = $pdo->prepare('UPDATE tasks SET title = ?, description = ? WHERE id = ?');
        return $stmt->execute([$data['title'], $data['description'], (int)$id]);
    }
    public static function delete($id) {
        $pdo = Database::get();
        $stmt = $pdo->prepare('DELETE FROM tasks WHERE id = ?');
        return $stmt->execute([(int)$id]);
    }
}
