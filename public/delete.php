<?php
require __DIR__ . '/../src/Task.php';

$id = $_GET['id'] ?? null;

if ($id) {
    Task::delete($id);
}

header("Location: index.php");
exit;
