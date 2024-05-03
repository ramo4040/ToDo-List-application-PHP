<?php

namespace app\views;

class LoginView {


    public static function renderLoginForm(string $errMsg = '') {

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>dev101</title>
            <link rel="stylesheet" href="http://localhost/todo/public/css/bootstrap.min.css">
            <link rel="stylesheet" href="http://localhost/todo/public/css/reset.css">
            <link rel="stylesheet" href="http://localhost/todo/public/css/style.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        </head>

        <body>
            <div class="__formContainer">
                <div class="logo"></div>
                <form id="login-form" method="post" action="./signin">
                    <header>
                        <h2>Hello Again</h2>
                        <p>Not a member? <a href="./signup">Register now</a></p>
                        <small>Enter your credentials to access your account</small>
                        <p id="errMsg"><?= $errMsg ?></p>
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
        </body>

        </html>
<?php
    }
}
