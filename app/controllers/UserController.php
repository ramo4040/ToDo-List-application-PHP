<?php

namespace app\controllers;

use app\services\UserService;
use app\views\LoginView;
use app\views\SignUpView;

session_start();

class UserController {
    public function __construct(private UserService $service) {
    }

    public function signUp() {
        if (isset($_POST['signup'])) {
            $jsonData = json_encode($_POST);
            $errMsg = $this->service->create($jsonData);
            $errMsg && SignUpView::renderSignUpForm(json_decode($errMsg)->error);
        }
    }

    public function signIn() {
        if (isset($_POST['login'])) {
            $jsonData = json_encode($_POST);
            $errMsg = $this->service->authentification($jsonData);
            $errMsg && LoginView::renderLoginForm(json_decode($errMsg)->error);
        }
    }
}
