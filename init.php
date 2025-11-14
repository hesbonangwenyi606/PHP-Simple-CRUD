<?php
// Run this once to create the SQLite database and tasks table
$dir = __DIR__ . '/data';
if (!is_dir($dir)) mkdir($dir, 0755, true);
$dbfile = $dir . '/database.sqlite';
$init = !file_exists($dbfile);
$pdo = new PDO('sqlite:' . $dbfile);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($init) {
    $pdo->exec("CREATE TABLE tasks (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT NOT NULL,
        description TEXT,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );");
    $stmt = $pdo->prepare('INSERT INTO tasks (title, description) VALUES (?, ?)');
    $stmt->execute(['Example task', 'This is a seeded task.']);
    echo "Database created at: $dbfile\n";
} else {
    echo "Database already exists at: $dbfile\n";
}
