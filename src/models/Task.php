<?php 
require_once __DIR__ . '../../../config/database.php';


class Task {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    public function getAllTasks() {
        $stmt = $this->pdo->query("SELECT * FROM tasks ORDER BY created_at DESC");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getTaskById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM tasks WHERE id = :id");
        $stmt->execute(['id' => $id]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createTask($title, $description) {
        $stmt = $this->pdo->prepare("INSERT INTO tasks (title, description, status, created_at)
         VALUES (:title, :description, 'pending', NOW())");

        return $stmt->execute([
            'title' => $title,
            'description' => $description
        ]);

     }

    public function updateTask($id, $title, $description, $status) {
        $stmt = $this->pdo->prepare("UPDATE tasks SET title = :title,
         description = :description, status = :status WHERE id = :id");

        return $stmt->execute([
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'status' => $status
        ]);    
    }

    public function deleteTask($id) {
        $stmt = $this->pdo->prepare("DELETE FROM tasks WHERE id = :id");

        return $stmt->execute(['id' => $id]);
    }
    
}

?>