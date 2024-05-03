<?php

namespace app\controllers;

use app\services\UserService;

session_start();

class UserController {
    public function __construct(private UserService $service) {
    }

    public function signUp() {
        if (isset($_POST['signup'])) {
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (empty($email) || empty($username) || empty($password)) {
                $_SESSION['login_error'] = 'Missing information. Please complete all fields.';
                header('Location: ./signup');
                return;
            }

            $this->service->create($email, $username, $password);

            header('Location: ./signin');
            exit;
        }
    }

    public function signIn() {
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (empty($username) || empty($password)) {
                $_SESSION['login_error'] = 'Missing information. Please complete all fields.';
                header('Location: ./signin');
                return;
            }

            $result =  $this->service->authentification($username, $password);

            if ($result) {
                session_start();
                $_SESSION["userID"] = $result['userID'];
                $_SESSION["userName"] = $result['userName'];
                header('Location: ./tasks');
            } else {
                $_SESSION['login_error'] = 'Incorrect username or password.';
                header('Location: ./signin');
            }
        }
    }
}
