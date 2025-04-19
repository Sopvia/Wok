<?php
session_start();

if (!isset($_SESSION['account_loggedin'])) { 
    header('Location: index.php');
    exit;
}
include '../header.php';
?>

<div class="content">
    <div class="page-title">
        <h2>Home</h2>
        <p>Welcome back, <?=htmlspecialchars($_SESSION['account_name'], ENT_QUOTES)?>!</p>
    </div>

    <div class="block">
        <p>You are logged in!</p>
    </div>
</div>

<?php include '../footer.php';?>