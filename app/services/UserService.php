<?php

namespace app\services;

use app\models\UserModel;


class UserService {
    public function __construct(private UserModel $model) {
    }

    public function create($jsonData) {
        $data = json_decode($jsonData);
        $email = $data->email ?? null;
        $username = $data->username ?? null;
        $password = $data->password ?? null;

        if (!$email || !$username || !$password) {
            http_response_code(400);
            return json_encode(['error' => 'Missing required fields']);
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->model->createUser($email, $username, $hashedPassword);

        http_response_code(303);
        header('Location: ./signin');
        exit;
    }


    public function authentification($jsonData) {
        $data = json_decode($jsonData);
        $username = $data->username ?? null;
        $password = $data->password ?? null;

        if (!$username || !$password) {
            http_response_code(400);
            return json_encode(['error' => 'Missing required fields']);
        }

        $user = $this->model->getUserByUsername($username);

        if (!$user || !password_verify($password, $user['password'])) {
            http_response_code(401);
            return json_encode(['error' => 'Incorrect username or password. ']);
        }

        if ($user) {
            session_start();
            $_SESSION["userID"] = $user['userID'];
            $_SESSION["userName"] = $user['userName'];
            header('Location: ./tasks');
        }
    }
}
