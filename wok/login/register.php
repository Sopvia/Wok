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
        <link href="../assets/fontawesome/solid.css" rel="stylesheet">
        <link href="../assets/fontawesome/all.min.css" rel="stylesheet">

        <title>Register</title>
    </head>
    <body>
        <div class="login">
            <h1>User Register</h1>

            <form action="register-process.php" method="post" class="form login-form">
                <label class="form-label" for="username">Username</label>
                <div class="form-group">
                    <i class="fa-solid fa-user icons"></i>
                    <input class="form-input" type="text" name="username" placeholder="Username" id="username" required>
                </div>

                <label class="form-label" for="email">E-Mail</label>
				<div class="form-group">
                    <i class="fa-solid fa-envelope icons"></i>
                    <input class="form-input" type="email" name="email" placeholder="E-Mail" id="email" required>
				</div>

				<label class="form-label" for="password">Password</label>
				<div class="form-group">
                    <i class="fa-solid fa-lock icons"></i>
                    <input class="form-input" type="password" name="password" placeholder="Password" id="password" autocomplete="new-password" required>
				</div>

                <button class="btn" type="submit">Register</button>
                <hr>
                <p class="register-link">Already have an account?</p>
                <a href="index.php" class="register-link form-link">
                    Login here
                    <i class="fa-solid fa-arrow-up-right-from-square icons"></i>
                </a>
            </form>
        </div>
    </body>
</html>