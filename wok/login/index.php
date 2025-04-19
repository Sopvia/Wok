<?php
session_start();

if (isset($_SESSION['account_loggedin'])) {
    header('Location: home.php');
    exit;
}
?>

<html>
    <body>
        <div class="login">
            <h1>User Login</h1>

            <form action="authenticate.php" method="post" class="form login-form">
                <label class="form-label" for="username">Username!</label>
                <div class="form-group">
                    <input class="form-input" type="text" name="username" placeholder="Username" id="username" required>
                </div>

                <label class="form-label" for="password">Password</label>
                <div class="form-group">
                    <input class="form-input" type="password" name="password" placeholder="Password" id="password" required>
                </div>

                <button class="btn" type="submit">Login</button>
                <a href="register.php" class="form-link">Register here</a>
            </form>
        </div>
    </body>
</html>
