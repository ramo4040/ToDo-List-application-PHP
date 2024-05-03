<?php

namespace app\views;


class SignUpView {

    public static function renderSignUpForm($errMsg = '') {
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
                <form id="login-form" method="post" action="./signup">
                    <header>
                        <h2>Sign up</h2>
                        <p>Already Have An Account? <a href="./signin">Log in</a></p>
                        <p id="errMsg"><?= $errMsg ?></p>
                    </header>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="signup">Sign up<i class="bi bi-chevron-right"></i></button>
                    </div>
                </form>
            </div>
        </body>

        </html>
<?php
    }
}
