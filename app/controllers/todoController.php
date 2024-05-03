<?php

namespace app\controllers;

use app\services\TaskService;
use app\views\TaskListView;
use app\views\TodoView;
use app\views\EditTaskView;



class TodoController {

    public function __construct(private TaskService $service) {
    }

    function main($htmlContent = null) {
        if (!isset($_SESSION['userName'])) {
            header("Location: ./signin");
            exit;
        }
        TodoView::setInfo($htmlContent);
        TodoView::renderTodoView();
    }

    function index() {
        $url = 'http://localhost/todo/api/tasks';
        $context = stream_context_create([
            'http' => [
                'header' => 'Cookie: ' .  'id=' . $_SESSION["userID"]
            ]
        ]);
        $response = json_decode(file_get_contents($url, false, $context), true);

        $this->main(TaskListView::render($response));
    }

    function getTask($id) {
        $url = 'http://localhost/todo/api/task/' . $id;
        $response = json_decode(file_get_contents($url), true)[0];
        $this->main(EditTaskView::render($response));
    }

    function addTask() {
        if (isset($_POST['addTask'])) {
            $jsonData = json_encode($_POST);
            $this->service->add($jsonData);
        }
    }

    function deleteTask() {
        if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
            $this->service->delete();
        }
    }

    function editTask($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            $this->service->editTask($id);
        }
    }
}
