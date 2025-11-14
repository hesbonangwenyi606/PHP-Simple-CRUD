<?php
$dir = __DIR__ . '/data';
if (!is_dir($dir)) mkdir($dir);

$path = $dir . '/database.sqlite';
if (file_exists($path)) {
    echo "Database already exists at: $path\n";
    exit;
}

$pdo = new PDO('sqlite:' . $path);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->exec("
CREATE TABLE tasks (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    description TEXT NOT NULL,
    created_at TEXT NOT NULL
);
");

$pdo->exec("
INSERT INTO tasks (title, description, created_at) VALUES
('Example Task', 'This is a seeded task.', datetime('now'));
");

echo "Database created and seeded at: $path\n";
