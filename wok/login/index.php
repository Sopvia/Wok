<?php
session_start();

if (isset($_SESSION['account_loggedin'])) {
    header('Location: home.php');
    exit;
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="../assets/fontawesome/solid.css" rel="stylesheet">
    <link href="../assets/fontawesome/all.min.css" rel="stylesheet">

    <title>Login</title>
</head>
    <body>
        <div class="login">
            <h1>Login</h1>

            <form action="authenticate.php" method="post" class="form login-form">
                <label class="form-label" for="username">Username</label>
                <div class="form-group">
                    <i class="fa-solid fa-user icons"></i>
                    <input class="form-input" type="text" name="username" placeholder="Username" id="username" required>
                </div>

                <label class="form-label" for="password">Password</label>
                <div class="form-group">
                    <i class="fa-solid fa-lock icons"></i>
                    <input class="form-input" type="password" name="password" placeholder="Password" id="password" required>
                </div>

                <button class="btn" type="submit">Login</button>
                <br>
                <hr>
                <a href="register.php" class="form-link">
                    Or register here
                    <i class="fa-solid fa-arrow-up-right-from-square icons"></i>
                </a>
            </form>
        </div>
    </body>
</html>
