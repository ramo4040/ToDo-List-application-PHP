<?php

namespace app\routes;

use app\Core\App;
use app\controllers\HomeController;
use app\controllers\TodoController;
use app\controllers\UserController;
use app\services\TaskService;

class Router {
    private static $routes = [];

    public static function get($route, $handler) {
        self::$routes['GET'][$route] = $handler;
    }

    public static function post($route, $handler) {
        self::$routes['POST'][$route] = $handler;
    }

    public static function put($route, $handler) {
        self::$routes['PUT'][$route] = $handler;
    }

    public static function delete($route, $handler) {
        self::$routes['DELETE'][$route] = $handler;
    }

    /**
     * @param array $request_method => GET POST ....
     * @param string $request_uri => /signup , /task/{id} ....
     */

    public static function route($request_method) {
        if (isset(self::$routes[$request_method])) {
            $request_uri = str_replace('/todo', '', $_SERVER['REQUEST_URI']);
            foreach (self::$routes[$request_method] as $route_pattern => $handler) {
                if (self::matchRoute($route_pattern, $request_uri)) {
                    self::callHandler($handler, $request_uri);
                    return;
                }
            }
        }
        http_response_code(404);
        echo "404 Not Found";
    }


    /**
     * @param array $route_pattern => route inside self::routes 
     * @param string $request_uri => url entred by user 
     */

    private static function matchRoute($route_pattern, $request_uri) {
        $regex = str_replace('/', '\/', $route_pattern);
        $regex = str_replace('{id}', '(\d+)', $regex);
        $regex = '/^' . $regex . '$/';

        return preg_match($regex, $request_uri);
    }

    private static function callHandler($handler, $request_uri) {
        $matches = [];
        preg_match('/\d+/', $request_uri, $matches);
        $id = $matches[0] ?? null;
        $controller = App::container()->get($handler[0]);
        call_user_func([$controller, $handler[1]], $id);
    }
}



Router::get('/', [HomeController::class, 'index']);

Router::get('/signup', [HomeController::class, 'signup']);
Router::get('/signin', [HomeController::class, 'signIn']);

Router::post('/signup', [UserController::class, 'signup']);
Router::post('/signin',  [UserController::class, 'signIn']);

Router::get('/tasks', [TodoController::class, 'index']);
Router::get('/task/{id}', [TodoController::class, 'getTask']);

Router::get('/api/tasks', [TaskService::class, 'showAll']);
Router::get('/api/task/{id}', [TaskService::class, 'getTask']);
Router::post('/api/task', [TodoController::class, 'addTask']);
Router::delete('/api/task', [TodoController::class, 'deleteTask']);
Router::put('/api/task/{id}', [TodoController::class, 'editTask']);
