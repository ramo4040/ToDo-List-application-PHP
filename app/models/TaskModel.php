<?php

namespace app\models;

use PDO;

class TaskModel {

    public function __construct(private PDO $pdo) {
    }

    public function __destruct() {
        unset($this->pdo);
    }

    public function getAllTasks() {
        $statement = $this->pdo->prepare('SELECT idtask,TitleTask,descTask,createdAt FROM tasks WHERE createdBy = ?');
        $statement->execute([$_SESSION["userID"]]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTask($id) {
        $statement = $this->pdo->prepare('SELECT idtask,TitleTask,descTask FROM tasks WHERE idtask = ?');
        $statement->execute([$id]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertTask($title, $description, $createdBy) {
        $statement = $this->pdo->prepare('INSERT INTO tasks (TitleTask, descTask,createdBy) VALUES (?,?,?)');
        $statement->execute([
            $title,
            $description,
            $createdBy
        ]);
    }

    public function deleteTask($id) {
        $placeholders = implode(',', array_fill(0, count($id), '?'));
        $statement = $this->pdo->prepare("DELETE FROM tasks WHERE idtask IN ($placeholders)");
        $statement->execute($id);
    }

    public function editTask($id, $title, $description) {
        $statement = $this->pdo->prepare('UPDATE tasks SET TitleTask = ? ,descTask= ? WHERE idtask = ?');
        $statement->execute([
            $title,
            $description,
            $id
        ]);
    }
}
