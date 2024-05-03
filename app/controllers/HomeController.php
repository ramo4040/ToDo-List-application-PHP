<?php

namespace app\controllers;

use app\views\LoginView;
use app\views\SignUpView;

class HomeController {

    function index() {
        echo '<h1 style="font-size: 4rem;">To-Do List Application with REST API </h1><br>';
        echo '<a href="./signup" id="mainPage">GET STARTED</a>';
    }

    function signUp() {
        SignUpView::renderSignUpForm();
    }

    function signIn() {
        LoginView::renderLoginForm();
    }
}
