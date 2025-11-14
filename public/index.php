<?php
require_once __DIR__ . '/../src/Task.php';

use App\Task;

$tasks = Task::all();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Simple Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">PHP Simple Tasks</h2>
        <a href="create.php" class="btn btn-primary">+ New Task</a>
    </div>

    <?php foreach ($tasks as $task): ?>
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($task['title']) ?></h5>
                <p class="card-text"><?= nl2br(htmlspecialchars($task['description'])) ?></p>
                <p class="text-muted small">#<?= $task['id'] ?> • <?= $task['created_at'] ?></p>
                <a href="edit.php?id=<?= $task['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="delete.php?id=<?= $task['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
