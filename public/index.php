<?php
require_once __DIR__ . '/../src/Database.php';
require_once __DIR__ . '/../src/Task.php';
require_once __DIR__ . '/../templates/header.php';
use App\Task;

// simple router based on ?action and id
$action = $_GET['action'] ?? 'list';
if ($action === 'list') {
    $tasks = Task::all();
?>
  <a class="button" href="?action=new">+ New Task</a>
  <ul class="tasks">
  <?php foreach ($tasks as $t): ?>
    <li>
      <strong><?=htmlspecialchars($t['title'])?></strong>
      <div class="meta">#<?=$t['id']?> • <?=$t['created_at']?></div>
      <div class="desc"><?=nl2br(htmlspecialchars($t['description']))?></div>
      <div class="actions">
        <a href="?action=edit&id=<?=$t['id']?>">Edit</a> |
        <a href="?action=delete&id=<?=$t['id']?>" onclick="return confirm('Delete?')">Delete</a>
      </div>
    </li>
  <?php endforeach; ?>
  </ul>
<?php
} elseif ($action === 'new') {
?>
  <h2>New Task</h2>
  <form method="post" action="?action=create">
    <label>Title<br><input name="title" required></label><br>
    <label>Description<br><textarea name="description"></textarea></label><br>
    <button type="submit">Create</button>
    <a href="/">Cancel</a>
  </form>
<?php
} elseif ($action === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    Task::create($_POST);
    header('Location: /');
    exit;
} elseif ($action === 'edit' && isset($_GET['id'])) {
    $task = Task::find($_GET['id']);
?>
  <h2>Edit Task #<?=$task['id']?></h2>
  <form method="post" action="?action=update&id=<?=$task['id']?>">
    <label>Title<br><input name="title" value="<?=htmlspecialchars($task['title'])?>" required></label><br>
    <label>Description<br><textarea name="description"><?=htmlspecialchars($task['description'])?></textarea></label><br>
    <button type="submit">Save</button>
    <a href="/">Cancel</a>
  </form>
<?php
} elseif ($action === 'update' && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
    Task::update($_GET['id'], $_POST);
    header('Location: /');
    exit;
} elseif ($action === 'delete' && isset($_GET['id'])) {
    Task::delete($_GET['id']);
    header('Location: /');
    exit;
} else {
    echo "<p>Unknown action.</p>";
}

require_once __DIR__ . '/../templates/footer.php';
