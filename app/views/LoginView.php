<?php

namespace app\views;

session_start();

class LoginView {


    public static function renderLoginForm() {
        $errorMessage = isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '';
        session_destroy();
?>
        <div class="__formContainer">
            <div class="logo"></div>
            <form id="login-form" method="post" action="./signin">
                <header>
                    <h2>Hello Again</h2>
                    <p>Not a member? <a href="./signup">Register now</a></p>
                    <small>Enter your credentials to access your account</small>
                    <p id="errMsg"><?= $errorMessage ?></p>
                </header>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </div>
                <div class="form-group">
                    <button type="submit" name="login">Log In <i class="bi bi-chevron-right"></i></button>
                </div>
            </form>
        </div>
<?php
    }
}
