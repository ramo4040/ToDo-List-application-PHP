<?php

namespace app\services;

use app\models\UserModel;

class UserService {
    public function __construct(private UserModel $model) {
    }

    public function create($email, $username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->model->createUser($email, $username, $hashedPassword);
        return true;
    }


    public function authentification($username, $password) {
        $user = $this->model->getUserByUsername($username);

        if (!$user || !password_verify($password, $user['password'])) {
            http_response_code(401);
            return false;
        }

        http_response_code(200);
        return $user;
    }
}
