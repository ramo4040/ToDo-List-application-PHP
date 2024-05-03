<?php

namespace app\controllers;

use app\services\TaskService;
use app\views\TaskListView;
use app\views\TodoView;
use app\views\EditTaskView;

session_start();

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
        $tasks = $this->service->showAll();
        $this->main(TaskListView::render($tasks));
    }

    function getTask($id) {
        $task = $this->service->getTask($id);
        $this->main(EditTaskView::render($task[0]));
    }

    function addTask() {
        if (isset($_POST['addTask'])) {
            $this->service->add($_POST['title'], $_POST['description']);
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
