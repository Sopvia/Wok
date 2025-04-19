<?php
session_start();

if (isset($_SESSION['account_loggedin'])) {
    header('Location: home.php');
    exit;
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" type="text/css">
        <title>Register</title>
    </head>
    <body>
        <div class="login">
            <h1>Member Register</h1>

            <form action="register-process.php" method="post" class="form login-form">
                <label class="form-label" for="username">Username</label>
                <div class="form-group">
                    <div class="icon">i</div>
                    <input class="form-input" type="text" name="username" placeholder="Username" id="username" required>
                </div>

                <label class="form-label" for="email">E-Mail</label>
				<div class="form-group">
                    <div class="icon">i</div>
                    <input class="form-input" type="email" name="email" placeholder="E-Mail" id="email" required>
				</div>

				<label class="form-label" for="password">Password</label>
				<div class="form-group">
                    <div class="icon">i</div>
                    <input class="form-input" type="password" name="password" placeholder="Password" id="password" autocomplete="new-password" required>
				</div>

                <button class="btn" type="submit">Register</button>
                <p class="register-link">Already have an account? <a href="index.php" class="form-link">Login</a></p>
            </form>
        </div>
    </body>
</html>