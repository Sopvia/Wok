<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="assets/css/form.css" rel="stylesheet">
    <link href="assets/css/var.css" rel="stylesheet">
    <link href="assets/fontawesome/solid.css" rel="stylesheet">
    <link href="assets/fontawesome/all.min.css" rel="stylesheet">
    <script src="script.js" defer></script> 

    <title>Wok</title>
</head>
<body>
    <header class="header">
            <div class="container">
                <a href="home.php">
                    <i class="fa-solid fa-w icons logo"></i>
                    <hr class="vertical">
                    <h1 class="title">Wok</h1>
                </a>

                <nav class="menu">
                    <div>
                        <i class="fa-solid fa-calendar-days icons"></i>
                        <?php echo date("d.m.y"); ?>
                    </div>
                    <a class="nav-btn" href="home.php">
                        <i class="fa-solid fa-house icons"></i>
                        Home
                    </a>
                    <a class="nav-btn" href="login/profile.php">
                        <i class="fa-solid fa-user icons"></i>
                        Profile
                    </a>
                    <a class="nav-btn" href="login/logout.php">
                        <i class="fa-solid fa-right-from-bracket icons"></i>
                        Logout
                    </a>
                </nav>
            </div>
        </header>
    <main>