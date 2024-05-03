<?php

namespace app\services;

use app\models\TaskModel;


class TaskService {

    function __construct(private TaskModel $model) {
    }

    public function showAll() {
        $user = $this->model->getAllTasks();
        return $user;
    }

    public function getTask($id) {
        $task = $this->model->getTask($id);
        return $task;
    }

    public function add($title, $description) {
        $this->model->insertTask($title, $description, $_SESSION['userID']);
        header("Location: ../tasks");
        exit;
    }

    public function delete() {
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents('php://input'), true);
        $this->model->deleteTask($data);
    }

    public function editTask($id) {
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents('php://input'), true);
        $this->model->editTask($id, $data['title'], $data['description']);
    }
}
