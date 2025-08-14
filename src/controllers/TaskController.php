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
            return ['success' => false, 'message' => 'Título obrigatório'];
        }

        $created = $this->taskModel->createTask($title, $description);

        if ($created) {
            return ['success' => true, 'message' => 'Tarefa criada com sucesso'];
        } else {
            return ['success' => false, 'message' => 'Falha ao criar tarefa'];
        }
    }

    public function editTaskForm($id) {
        $task = $this->taskModel->getTaskById($id);

        if(!$task) {
            die("Tarefa não encontrada");
        }

        require_once __DIR__ . "/../views/task_edit.php";
    }


    public function updateTask($id, $title, $description, $status) {
        if (empty($title)) {
            return ['success' => false, 'message' => 'Título obrigatório'];
        }

        $updated = $this->taskModel->updateTask($id, $title, $description, $status);

        if ($updated) {
            return ['success' => true, 'message' => 'Tarefa atualizada com sucesso'];
        } else {
            return ['success' => false, 'message' => 'Falha ao atualizar tarefa'];
        }
    }

    public function deleteTask($id) {
        $deleted = $this->taskModel->deleteTask($id);

        if ($deleted) {
            return ['success' => true, 'message' => 'Tarefa apagada com sucesso'];
        } else {
            return ['success' => false, 'message' => 'Falha ao apagar tarefa'];
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

    public function translateStatus($status) {
        $translations = [
            'pending' => 'Pendente',
            'completed' => 'Concluída' 
        ];
        return $translations[$status] ?? $status;
    }


}

?>