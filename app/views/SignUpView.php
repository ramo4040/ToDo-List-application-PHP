<?php

namespace app\views;

session_start();

class SignUpView {

    public static function renderSignUpForm() {
        $errorMessage = isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '';
        session_destroy();
?>
        <div class="__formContainer">
            <div class="logo"></div>
            <form id="login-form" method="post" action="./signup">
                <header>
                    <h2>Sign up</h2>
                    <p>Already Have An Account? <a href="./signin">Log in</a></p>
                    <p id="errMsg"><?= $errorMessage ?></p>
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
<?php
    }
}
