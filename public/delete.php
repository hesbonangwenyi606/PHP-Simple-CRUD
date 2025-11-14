<?php
require_once __DIR__ . '/../src/Task.php';
use App\Task;

$id = (int)($_GET['id'] ?? 0);
if ($id) Task::delete($id);

header('Location: index.php');
exit;
