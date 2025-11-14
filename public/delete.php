<?php
require_once __DIR__ . '/../src/Task.php';
use App\Task;

$id = $_GET['id'] ?? null;

if ($id) {
    Task::delete($id);
}

header('Location: index.php');
exit;
