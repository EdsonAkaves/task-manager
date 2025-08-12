<?php 
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/Task.php';

class TaskController {
    private $taskModel;

    public function __construct($pdo) {
        $this->taskModel = new Task($pdo);
    }

    public function listTasks() {
        return $this->taskModel->getAllTasks();
    }

    public function getTask($id) {
        return $this->taskModel->getTaskById($id);
    }

    public function createTask($title, $description) {
        if (empty($title)) {
            return ['success' => false, 'message' => 'Title is required'];
        }

        $created = $this->taskModel->createTask($title, $description);

        if ($created) {
            return ['success' => true, 'message' => 'Task created succesfully'];
        } else {
            return ['success' => false, 'message' => 'Failed to update task'];
        }
    }


    public function updateTask($id, $title, $description, $status) {
        if (empty($title)) {
            return ['success' => false, 'message' => 'Title is required'];
        }

        $updated = $this->taskModel->updateTask($id, $title, $description, $status);

        if ($updated) {
            return ['success' => true, 'message' => 'Task updated successfuly'];
        } else {
            return ['success' => false, 'message' => 'Failed to update task'];
        }
    }

    public function deleteTask($id) {
        $deleted = $this->taskModel->deleteTask($id);

        if ($deleted) {
            return ['success' => true, 'message' => 'Task deleted successfully'];
        } else {
            return ['success' => false, 'message' => 'Failed to delete task'];
        }
    }

    public function createTaskForm() {
        require_once __DIR__ . '/../views/task_create.php';
    }

    public function storeTask($title, $description) {
        $this->taskModel->createTask($title, $description);
        header("Location: /projetos/task-manager/public/index.php");
        exit;
    }
}

?>