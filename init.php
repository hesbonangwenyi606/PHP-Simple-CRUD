<?php
require __DIR__ . '/src/Database.php';

use App\Database;

$db = Database::get();
$db->exec("
    CREATE TABLE IF NOT EXISTS tasks (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT NOT NULL,
        description TEXT,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )
");

// Seed example task
$stmt = $db->prepare("INSERT INTO tasks (title, description) VALUES (?, ?)");
$stmt->execute(['Example task', 'This is a seeded task.']);

echo "Database ready at: " . __DIR__ . "/data/database.sqlite\n";
