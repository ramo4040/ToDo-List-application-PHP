<?php

namespace app\services;

use app\models\TaskModel;

class TaskService {

    function __construct(private TaskModel $model) {
    }

    public function showAll() {
        header('Content-Type: application/json');
        $tasks = $this->model->getAllTasks($_COOKIE['id']);
        echo json_encode($tasks);
    }

    public function getTask($id) {
        header('Content-Type: application/json');
        $task = $this->model->getTask($id);
        echo json_encode($task);
    }

    public function add($jsonData) {
        $jsonData = json_decode($jsonData, true);
        $title = $jsonData['title'];
        $description = $jsonData['description'];

        if (!$title || !$description) {
            http_response_code(400);
            header('Location: ../tasks');
            return json_encode(['error' => 'Missing required fields']);
        }

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
