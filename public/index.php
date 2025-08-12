<?php 

define('BASE_PATH', dirname(__DIR__));
require_once __DIR__ . '/../config/database.php';
require_once BASE_PATH . '/src/controllers/TaskController.php';

$controller = new TaskController($pdo);

$action = $_GET['action'] ?? '';

if ($action === 'create') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';
        $controller->storeTask($title, $description);
    } else {
        $controller->createTaskForm();
    }
} else {
    $tasks = $controller->listTasks();
    require_once __DIR__ . '/../src/views/task_list.php';
}

?>




