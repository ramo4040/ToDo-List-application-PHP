<?php

namespace app\Config;


use app\Core\App;
use app\services\Container;
use app\controllers\HomeController;
use app\controllers\UserController;
use app\services\UserService;
use app\models\UserModel;
use app\models\TaskModel;
use app\Config\Database;
use app\controllers\TodoController;
use app\services\TaskService;

$container = new Container();

// Database connection
$container->set(Database::class, fn () => Database::getDB());

// Controllers
$container->set(HomeController::class, fn () => new HomeController());
$container->set(UserController::class, fn ($container) => new UserController($container->get(UserService::class)));
$container->set(TodoController::class, fn () => new TodoController($container->get(TaskService::class)));

// Services
$container->set(UserService::class, fn ($container) => new UserService($container->get(UserModel::class)));
$container->set(TaskService::class, fn ($container) => new TaskService($container->get(TaskModel::class)));

// Models
$container->set(UserModel::class, fn ($container) => new UserModel($container->get(Database::class)));
$container->set(TaskModel::class, fn ($container) => new TaskModel($container->get(Database::class)));


App::setContainer($container);
