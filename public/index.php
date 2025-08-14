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
         $status = $_POST['status'] ?? 'pending';

        $controller->storeTask($title, $description);

    } else {
        $controller->createTaskForm();
    }

} elseif ($action === 'edit') {
    $id = $_GET['id'] ?? null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';        
        $status = $_POST['status'] ?? 'pending';


        $result = $controller->updateTask($id, $title, $description, $status);

                if ($result['success']) {
            header("Location: index.php");
            exit;
        } else {
            echo "<p style='color:red;'>{$result['message']}</p>";
            $controller->editTaskForm($id);
        }
    } else {
        $controller->editTaskForm($id);
    }

} elseif ($action === 'delete') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'] ?? null;
        if ($id) {
            $controller->deleteTask($id);
        }
        header("Location: index.php");
        exit;
    }

} else {
    $tasks = $controller->listTasks();
    require_once __DIR__ . '/../src/views/task_list.php';
}

?>




