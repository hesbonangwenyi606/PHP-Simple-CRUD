<?php
require_once __DIR__ . '/src/Database.php';

use App\Database;

$dataPath = __DIR__ . '/data/database.sqlite';

if (file_exists($dataPath)) {
    echo "Database already exists at: $dataPath\n";
    exit;
}

$pdo = Database::get();
$pdo->exec("
CREATE TABLE tasks (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    description TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
");

$pdo->exec("INSERT INTO tasks (title, description) VALUES 
    ('Example task', 'This is a seeded task.'),
    ('Hesbon Angwenyi', 'Software developer')
");

echo "Database created and seeded at: $dataPath\n";
